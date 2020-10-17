<template>
    <div>
        <BaseTable
            :headers="headers"
            :items="items"
            :title="title"
        />
    </div>
</template>

<script>
    import AppLayout from '@/js/Layouts/AppLayout'
    import BaseTable from '@/js/Components/BaseTable'

    export default {
        
        layout: (h, page) => h(AppLayout, [page]),
        layout: AppLayout,
        components:{
            BaseTable
        },
        props:{
            roles:{
                type:Array,
                default:[]
            }
        },

        data() {
            return {
                title:'role',
                headers:[
                    { title: 'Name',value: 'name'},
                    { title: 'Guard',value: 'guard_name'},
                    { title: 'Actions', value:'action'}
                ],
                items:[]
            }
        },
        created() {
            this.items = this.roles
        },

    }
</script>
