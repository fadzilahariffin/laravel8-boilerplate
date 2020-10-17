<template>

        <div class="py-12 mt-20">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table v-if="items.length > 0" class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg">
                        <thead class="text-white">
                            <tr v-if="items.length > 0" v-for="item in items" :key="item.id" class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th v-for="(header,i) in headers" :key="i" class="p-3 text-left">{{ header.title }}</th>
                            </tr>
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                            <tr v-if="items.length > 0" v-for="item in items" :key="item.id" class="flex flex-col flex-no-wrap sm:table-row mb-2 sm:mb-0">
                                <td v-for="(header,i) in headers" :key="i" class="border-grey-light border hover:bg-gray-100 p-3 truncate" :class="header.value == 'action' ? 'text-red-400 hover:text-red-600 hover:font-medium cursor-pointer' :''">
                                    <span  v-if="header.value != 'action'">{{ item[header.value] }}</span>
                                    <span v-else>Delete</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-else class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                            <div>
                            <p class="font-bold">There is no {{ title }} record found </p>
                            <p class="text-sm">You may not have created any yet. You could 
                                <jet-nav-link
                                 :href="route('dashboard')"
                                 class="cursor-pointer"
                                >
                                create a {{ title }}
                                </jet-nav-link>
                                now
                            </p> 
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</template>

<script>
import JetNavLink from "./../Jetstream/NavLink";
export default {
    components:{
        JetNavLink
    },
    props:{
        headers:{
            type:Array,
            default:[]
        },
        items:{
            type:Array,
            default:[]
        },
        title: {
            type:String,
            default:null
        }
    },
    created() {
        console.log(this.items.length)
    },
}

</script>

<style>

  @media (min-width: 640px) {
    table {
      display: inline-table !important;
    }

    thead tr:not(:first-child) {
      display: none;
    }
  }

  td:not(:last-child) {
    border-bottom: 0;
  }

  th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, .1);
  }
</style>