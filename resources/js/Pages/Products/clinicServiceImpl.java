package com.kprise.service.clinic;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.apache.commons.lang3.RandomStringUtils;
import org.apache.commons.lang3.StringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.kprise.dao.clinic.ClinicDao;
import com.kprise.dao.ecommerce.order.CourseAssignmentExecutor;
import com.kprise.dao.ecommerce.order.EventAssignmentExecutor;
import com.kprise.dao.ecommerce.order.LearningPathAssignmentExecutor;
import com.kprise.dao.ecommerce.order.SurveyAssignmentExecutor;
import com.kprise.model.Attendee;
import com.kprise.model.GroupMemberAssc;
import com.kprise.model.TXCourseZipCode;
import com.kprise.model.common.Address;
import com.kprise.model.common.DashboardNotification;
import com.kprise.model.common.Org;
import com.kprise.model.dtos.ClinicDto;
import com.kprise.model.dtos.GroupMemberDto;
import com.kprise.model.ecommerces.Order;
import com.kprise.model.ecommerces.OrderItem;
import com.kprise.model.ecommerces.Product;
import com.kprise.model.ecommerces.Product.PeriodType;
import com.kprise.model.email.EmailProp;
import com.kprise.model.email.EmailProp.EmailAction;
import com.kprise.model.email.EmailProp.EmailSpecialParam;
import com.kprise.model.learningPath.Record;
import com.kprise.model.learningPath.RecordAssignment;
import com.kprise.model.user.FullUser;
import com.kprise.model.user.Group;
import com.kprise.model.user.GroupCategory;
import com.kprise.model.user.GroupMember;
import com.kprise.model.user.GroupMember.MembershipRole;
import com.kprise.model.user.GroupRecord;
import com.kprise.model.user.GroupRecordPK;
import com.kprise.model.user.User;
import com.kprise.model.user.User.UserType;
import com.kprise.model.user.UserProfile;
import com.kprise.model.user.UserRole.UserRoles;
import com.kprise.service.GroupService;
import com.kprise.service.KpriseService;
import com.kprise.service.PropertyService;
import com.kprise.service.RecordService;
import com.kprise.service.UserService;
import com.kprise.service.email.EmailService;
import com.kprise.service.util.EncryptUtil;
import com.kprise.util.StringUtil;

@Service("clinicService")
@Transactional
public class ClinicServiceImpl implements ClinicService {
	
	public static final int ADMIN_REGISTRATION 	= 0;
	public static final int INSTRUCTOR_REGISTRATION = 1;
	public static final int MANAGER_REGISTRATION = 2;
	public static final int STUDENT_REGISTRATION = 3;
	public static final int REPORT_REGISTRATION = 4;
	
	@Autowired
	private UserService userService;
	
	@Autowired
	private EmailService emailService;
	
	@Autowired
	private PropertyService propertyService;
	
	@Autowired
	private GroupService groupService;
	
	@Autowired
	private ClinicDao clinicDao;
	
	@Autowired
	private KpriseService kpriseService;
	
	@Autowired
	private RecordService recordService;
		
	@Autowired
	private CourseAssignmentExecutor courseAssignmentExecutor;
	
	@Autowired
	private LearningPathAssignmentExecutor lpAssignmentExecutor;
	
	@Autowired
	private EventAssignmentExecutor eventAssignmentExecutor;
	
	@Autowired
	private SurveyAssignmentExecutor surveyAssignmentExecutor;
	
	public void createClinicUser(ClinicDto clinicDto){
		for(Attendee attendee:clinicDto.getAttendees()){
			if(StringUtils.isNotBlank(attendee.getEmail())){
  				User checkUser = userService.getUser(attendee.getEmail());
				if(checkUser == null){
					User user = new FullUser();
					user.setCreatorId(attendee.getEmail());
					user.setUserName(attendee.getEmail());
					//create random password i.e RandomStringUtils.random(length, useAlphabet , userNumeric);
					String password = RandomStringUtils.random(10, true, false);
					try {
						user.setPassword(EncryptUtil.encrypt(password).getBytes());
						user = (FullUser) userService.populateUserWithEncryptedPassword((FullUser) user, password);
					} catch (Exception e) {	
						//
					}
					
					user.setEmail(attendee.getEmail());
					user.setFirstName(attendee.getFirstName());
					user.setLastName(attendee.getLastName());
					user.setUserType(UserType.User);
					user.setLeadFlag(false);
					user.setApproveFlag(false);
					user.setJobTitle(attendee.getDesignation());
					Org org = new Org(1);
					user.setOrgId(org.getOrgId());
					UserProfile userProfile = new UserProfile();
					userProfile.setUserName(attendee.getEmail());
					userProfile.setLastName(attendee.getFirstName());
					userProfile.setFirstName(attendee.getLastName());
					userProfile.setCreatorId(user.getCreatorId());
					Address address = new Address();
					/*address.setState(null);
					address.setCountry(null);*/
					userProfile.setAddress(address);	
					user.setUserProfile(userProfile);	
					userService.createUser(user);
					List<String> roles = this.getRoles(STUDENT_REGISTRATION);
					userService.addUserRoles(user, roles);
					
					List<String> members = new ArrayList<>();
					members.add(attendee.getEmail());
					//add users into same group
					groupService.createGroupMembers(members, MembershipRole.mem, clinicDto.getGroupId());
					//
					kpriseService.sessionFlush();
					
					List<Integer> recordIds = groupService.getRecordIdsByGroupId(clinicDto.getGroupId());
					List<String> trainings = new ArrayList<>();
					for(Integer recordId:recordIds){
						Record record = kpriseService.getEntity(Record.class, recordId);						
						if(record != null){
							//check if record is already assigned to user
							RecordAssignment recordAssignment = recordService.checkExistingRecordAssignment(user.getUserName(), record.getRecordId());
							if(recordAssignment == null){
								// create an assignment
								createRecordAssignment(user, record);
								
								//add to training list to send the mail
								trainings.add(record.getRecordName());
							}
						}
					}
					
					//add user to the region group as well
					if(clinicDto.getLmsRegion() != null){
						Group regionGrp = groupService.getGroupByGrpNameAndCategory("LmsRegion", clinicDto.getLmsRegion());
						if(null != regionGrp)
							groupService.createGroupMembers(members, MembershipRole.mem, regionGrp.getGroupId());
					}
					
					EmailProp emailProp = emailService.getEmailPropertiesByAction(EmailAction.ToothceUserRegistration.name());
					Map<String, Object> contentModel = new HashMap<String, Object>();
					contentModel.put("user", user);
					contentModel.put("clinicName", clinicDto.getClinicName());
					contentModel.put("password", password);
					if(clinicDto.getLmsRegion() != null){
						if(clinicDto.getLmsRegion().equalsIgnoreCase("INDIA")){
							contentModel.put("loginLink", propertyService.getPropertyValue("appBase")+"/ind");
						}else{
							contentModel.put("loginLink", propertyService.getPropertyValue("appBase")+"/login");
						}
					}else{
						contentModel.put("loginLink", propertyService.getPropertyValue("appBase")+"/login");
					}
					
					List<Group> clinicGroups = groupService.getGroupsByLoggedUser(user.getUserName());
					if(null != clinicGroups && !clinicGroups.isEmpty()){		
						Group clinic = clinicGroups.get(0);
						contentModel.put("clinic", clinic);
						if(clinic.getLicenseNumber() == null)
							contentModel.put("licenseNumber", "-");
						else
							contentModel.put("licenseNumber", clinic.getLicenseNumber());
						//			
						contentModel.put("licence", getLicenceDetail(clinic.getGroupId()));
					}
					
					contentModel.put(EmailSpecialParam.userName.toString(), attendee.getEmail());
					contentModel.put(EmailSpecialParam.saveEmailStatus.toString(), Boolean.TRUE);
					contentModel.put(EmailSpecialParam.objectId.toString(),user.getUserName());
					emailService.sendSync(emailProp, contentModel);
					
					if(!trainings.isEmpty() && trainings.size() > 0){
						//Send Email Invitations
						user.setLmsRegion(clinicDto.getLmsRegion());
					    sendEmailInvitation(user, trainings);
					}
					
					// Create Group Member Association			
					com.kprise.model.Product product = kpriseService.getProductById(attendee.getProductId());
					GroupMemberAssc  memAssc = new GroupMemberAssc();
					memAssc.setActiveFlag("Y");
					memAssc.setMemberAscKey(product.getProductId().toString());
					memAssc.setMemberAscVal(product.getProductName());
					memAssc.setUserName(user.getUserName());
					groupService.createMemberAssociations(memAssc);
				}
			}
		}
	}
	
	
	public void reinviteClinicUser(Integer groupId,String username){
		User user = userService.getUser(username);
		
		//create random password i.e RandomStringUtils.random(length, useAlphabet , userNumeric);
		String password = RandomStringUtils.random(10, true, false);
		try {
			user.setPassword(EncryptUtil.encrypt(password).getBytes());
			user = (FullUser) userService.populateUserWithEncryptedPassword((FullUser) user, password);
			kpriseService.update(user);
		} catch (Exception e) {	
			//
		}
		
		// group detail
		Group group = kpriseService.getEntity(Group.class, groupId);
		
		EmailProp emailProp = emailService.getEmailPropertiesByAction(EmailAction.ToothceUserRegistration.name());
		Map<String, Object> contentModel = new HashMap<String, Object>();
		contentModel.put("user", user);
		contentModel.put("clinicName", group.getGroupName());
		contentModel.put("password", password);
		List<Group> grps = groupService.getUserGroupsByCategory(user.getUserName(), "LmsRegion");
		String lmsRegion =  null;
		if(!grps.isEmpty() || grps != null){
			for(Group grp :grps){
				lmsRegion = grp.getGroupName();
			}
		}
		if(lmsRegion != null){
			if(lmsRegion.equalsIgnoreCase("INDIA")){
				contentModel.put("loginLink", propertyService.getPropertyValue("appBase")+"/ind");
			}else{
				contentModel.put("loginLink", propertyService.getPropertyValue("appBase")+"/login");
			}
		}else{
			contentModel.put("loginLink", propertyService.getPropertyValue("appBase")+"/login");
		}
		contentModel.put(EmailSpecialParam.userName.toString(), user.getEmail());
		contentModel.put(EmailSpecialParam.saveEmailStatus.toString(), Boolean.TRUE);
		contentModel.put(EmailSpecialParam.objectId.toString(),user.getUserName());
		emailService.sendSync(emailProp, contentModel);
	}
	
	
	public void createRecordAssignment(User user, Record record) {
		Order order = new Order();
		order.setUser(user);
		Product product = new Product();
		product.setSourceRecord(record);
		product.setPeriodType(PeriodType.Year);
		product.setValidityPeriod(10);
		OrderItem orderItem = new OrderItem();
		orderItem.setProduct(product);
		if(record.getRecordType().equalsIgnoreCase("LEARNINGPATH")){
			lpAssignmentExecutor.execute(order, orderItem);
		} else if(record.getRecordType().equalsIgnoreCase("COURSESCORM")){
			courseAssignmentExecutor.execute(order, orderItem);
		} else if(record.getRecordType().equalsIgnoreCase("EVENT")){
			eventAssignmentExecutor.execute(order, orderItem);
		} else if(record.getRecordType().equalsIgnoreCase("SRVY")){
			surveyAssignmentExecutor.execute(order, orderItem);
		}
		
		if(record.getRecordType().equalsIgnoreCase("EVENT")){
			EmailProp emailProp = emailService.getEmailPropertiesByAction(EmailAction.NewEventAssignment.name());
			Map<String, Object> contentModel = new HashMap<String, Object>();
			contentModel.put("user", user);
			contentModel.put("recordName", record.getRecordName());
			if(!StringUtil.isNullBlankOrEmpty(user.getUserName())){
				contentModel.put(EmailSpecialParam.userName.toString(), user.getUserName());
			}else{
				contentModel.put(EmailSpecialParam.userName.toString(), user.getEmail());
			}
			contentModel.put(EmailSpecialParam.saveEmailStatus.toString(), Boolean.TRUE);
			contentModel.put(EmailSpecialParam.toEmail.toString(), user.getEmail());
			contentModel.put(EmailSpecialParam.objectId.toString(), user.getUserName());
			emailService.sendSync(emailProp, contentModel);
		}
	}
	
	public void sendEmailInvitation(User user, List<String> trainings) {
		EmailProp emailProp = emailService.getEmailPropertiesByAction(EmailAction.NewTrainingAssignment.name());
		Map<String, Object> contentModel = new HashMap<String, Object>();
		contentModel.put("user", user);
		contentModel.put("trainings", trainings);
		if(!StringUtil.isNullBlankOrEmpty(user.getUserName())){
			contentModel.put(EmailSpecialParam.userName.toString(), user.getUserName());
		}else{
			contentModel.put(EmailSpecialParam.userName.toString(), user.getEmail());
		}
		String lmsRegion =  null;
		if(!user.getLmsRegion().isEmpty() || user.getLmsRegion() != null){
				lmsRegion = user.getLmsRegion();
		}
		if(lmsRegion != null){
			if(lmsRegion.equalsIgnoreCase("INDIA")){
				contentModel.put("toothceLogin", "https://lms.toothce.com/ind");
			}else{
				contentModel.put("toothceLogin", "https://lms.toothce.com");
			}
		}else{
			contentModel.put("toothceLogin", "https://lms.toothce.com");
		}
		contentModel.put(EmailSpecialParam.saveEmailStatus.toString(), Boolean.TRUE);
		contentModel.put(EmailSpecialParam.toEmail.toString(), user.getEmail());
		contentModel.put(EmailSpecialParam.objectId.toString(), user.getUserName());
		emailService.sendSync(emailProp, contentModel);
		
	}
	
	public Group createClinic(String groupName, String grpCode, Boolean trialFlag){
		Group clinicGrp = new Group();
		clinicGrp.setGroupName(groupName);
		//Group code will be GRP_addrId
		clinicGrp.setGroupCode(grpCode);
		GroupCategory grpCat = groupService.getGroupCategoryByCode("ClinicGroupCat");
		clinicGrp.setCategoryId(grpCat.getCategoryId());
		clinicGrp.setPrivateGroup(false);
		clinicGrp.setGroupState(Group.ACTIVATE);
		if(null != trialFlag && trialFlag){
			clinicGrp.setDisableMemberManagement(true);
		}
		groupService.createOrEditGroup(clinicGrp);
		return clinicGrp;
	}
	
	private void addRecordToGroup(Group clinicGrp, Record record, Integer grpPack){
		GroupRecord groupRecord = new GroupRecord();
		groupRecord.setGroup(clinicGrp);
		groupRecord.setRecord(record);
		groupRecord.setGroupUserPack(grpPack);
		groupRecord.setGroupRecordState(GroupRecord.ACTIVATE);
		kpriseService.create(groupRecord);
	}
	
	
	public List<DashboardNotification> getClinicNotifications(Integer groupId){
		return clinicDao.getClinicNotifications(groupId);
	}
	
	public DashboardNotification getClinicNotification(Integer groupId,Integer notificationId){
		return clinicDao.getClinicNotification(groupId, notificationId);
	}
	
	public void saveClinicDetails(ClinicDto clinicDto){
		Group group = kpriseService.getEntity(Group.class,clinicDto.getGroupId());
		group.setLicenseNumber(clinicDto.getLicenseNumber());
		group.setGrpAGD(clinicDto.getGrpAGD());
		kpriseService.update(group);
	}
	
	public void updateClinicZipCode(ClinicDto clinicDto){
		
		TXCourseZipCode  zip = new TXCourseZipCode();
		// check texas zip 
		zip = kpriseService.getEntity(TXCourseZipCode.class,clinicDto.getZipCode());
		//get group (clinic)
		Group group = kpriseService.getEntity(Group.class,clinicDto.getGroupId());
		// get clinic manager
		GroupMember groupManager = groupService.getGroupManagerByGroupId(clinicDto.getGroupId());
		boolean txasCourse = false;
		boolean nonTxasCourse = false;
		
		//now add record assignment of program to manager
		List<Integer> recordIds = groupService.getRecordIdsByGroupId(group.getGroupId());
		for(Integer recordId : recordIds){
			Record record = kpriseService.getEntity(Record.class, recordId);		
			if("HIPAA/TX HB 300 Program".equalsIgnoreCase(record.getRecordName()))
				txasCourse = true;
			
			if("HIPAA HB 300 Program".equalsIgnoreCase(record.getRecordName()))
				nonTxasCourse = true;			
		}
		
		if(!txasCourse || !nonTxasCourse){
			if(txasCourse && zip == null ){
				Record record = recordService.getRecordsByName("HIPAA/TX HB 300 Program");
				String course = "HIPAA HB 300 Program";
				Record txasExcludeRecord = recordService.getRecordsByName(course);
				// get groupRecord record for get user pack of (HIPAA/TX HB 300 Program)
				GroupRecordPK pk = new GroupRecordPK(record, group);
				GroupRecord groupRecord = kpriseService.getEntity(GroupRecord.class,pk);				
				// assign record to group				
				addRecordToGroup(group, txasExcludeRecord , groupRecord.getGroupUserPack());
				
				List<GroupMemberDto> members = groupService.getGroupMembersByGroupId(group.getGroupId(), GroupMember.ACTIVATE);
				for(GroupMemberDto member:members){
					// create an assignment
				//	createRecordAssignment(groupManager.getUser(), txasExcludeRecord);
				}
			}
			
			if(nonTxasCourse && zip != null ){
				Record record = recordService.getRecordsByName("HIPAA HB 300 Program");
				String course = "HIPAA/TX HB 300 Program";
				Record txasRecord = recordService.getRecordsByName(course);
				// get groupRecord record for get user pack of (HIPAA/TX HB 300 Program)
				GroupRecordPK pk = new GroupRecordPK(record, group);
				GroupRecord groupRecord = kpriseService.getEntity(GroupRecord.class,pk);				
				// assign record to group				
				addRecordToGroup(group, txasRecord , groupRecord.getGroupUserPack());
				
				List<GroupMemberDto> members = groupService.getGroupMembersByGroupId(group.getGroupId(), GroupMember.ACTIVATE);
				for(GroupMemberDto member:members){
					// create an assignment
			//		createRecordAssignment(groupManager.getUser(), txasRecord);
				}
			}
		}		
		
		
		// Address
		Address address = groupManager.getUser().getUserProfile().getAddress();
		address.setZipcode(clinicDto.getZipCode());
		kpriseService.update(address);
		
	}
	
	public ClinicDto getLicenceDetail(Integer groupId){
		return  clinicDao.getLicenceDetail(groupId);
	}
	
	/********************************************************************************************************************************************************************************************/
	
	protected List<String> getRoles(int registrationType){
		List<String> roles = new ArrayList<String>();
		roles.add(UserRoles.user.getDescription());
		switch(registrationType) {
			case ADMIN_REGISTRATION:{
				roles.add(UserRoles.admin.getDescription());
				break;
			}
			case MANAGER_REGISTRATION:{
				roles.add(UserRoles.manager.getDescription());
				break;
			}
			case STUDENT_REGISTRATION:{
				roles.add(UserRoles.student.getDescription());
				break;
			}
			case REPORT_REGISTRATION:{
				roles.add(UserRoles.report.getDescription());
				break;
			}
		}
		return roles;
	}	

}
