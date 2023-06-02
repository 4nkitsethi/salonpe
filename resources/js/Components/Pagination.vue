<template>
     <div  class="d-flex align-items-center p-3">
        <ul class="pagination mx-auto" v-if="links.length > 3">
            <template v-for="(link, key) in links">						
                <li class="page-item disabled" v-if="link.url === null">
                    <inertia-link href="#" class="page-link" v-html="link.label"></inertia-link>
                </li>						
                <li class="page-item" :class="{ 'active': link.active }"  v-else >
                    <inertia-link :href="link.url" class="page-link" v-html="link.label"></inertia-link>
                </li>
            </template>
        </ul>
    </div>
</template>

<script>
    export default {
        props:["links"]
    }
</script>