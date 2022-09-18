<template>
    <div class="w-10/12 m-auto h-screen fixed top-20 right-0 flex justify-center ">
        <div class="group inline-block z-40">
            <button class="outline-none focus:outline-none justify-between border border-gray-500 px-1 py-1.5 rounded-sm flex items-center min-w-32">
                <span class="text-black">{{ title }}</span>
                <span class=" w-2/12 ">
                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" >
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </span>
            </button>
            <!-- ________BUTTON GET TO DO ________-->
            <ul class="bg-gra-500 border rounded-sm scale-0 group-hover:scale-100 absolute duration-150 ease-in-out origin-top min-w-32 z-40">
                <li class="rounded-sm px-2 py-1 hover:bg-gray-400 flex justify-start cursor-pointer text-black hover:text-white " @click="$router.push({ path: item.route })" v-for="item of datas" :key="item">
                {{ item.title}}
                </li>
            </ul>
        </div>
    </div>
</template>
<script>

export default {
    components: { },
    data(){
         return {
            title:"List Student",
            datas: [
                {title: 'Profiles', route: '/profiles'},
                {title: 'Item', route: '/'},
                {title: 'Lougout', route: '/'},
            ]
         }
    }
}
</script>


