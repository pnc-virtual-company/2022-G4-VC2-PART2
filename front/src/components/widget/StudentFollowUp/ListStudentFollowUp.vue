<template>

   <div v-for="item of listStudents" :key="item" class="z-0">
    <div  class="w-full flex flex-row px-0.5 py-1 justify-between items-center hover:bg-gray-300 cursor-pointer" @click="getChat(item.user.id)" :class="{ 'bg-[#5184b0]':item.user.id == isChatID && item.if_follow_up == 'Yes' , 'text-white':item.user.id == isChatID && item.if_follow_up == 'Yes',  'hover:text-black':item.if_follow_up == 'Yes'}">
        <div class="flex flex-row">
            <div class="w-14 h-14  flex justify-center items-center">
              <!-- <img :src="item.user.img?item.user.img:avataImage" class="object-cover h-12 w-12 rounded-full" alt=""/> -->
              <img :src="item.user.img?item.user.img:avataImage" class="object-cover h-12 w-12 rounded-full" alt=""/>
            </div>
            <div class="flex items-center">
              <span class="text-[12px] capitalize">{{ item.user.first_name}} {{ item.user.last_name}} ({{item.year}}-{{ item.class}})</span>
            </div>
        </div>

        <div class="w-1/6 flex justify-end px-1 " v-if=" item.if_follow_up != 'Yes'">
            <input type="checkbox" class="form-checkbox h-6 w-6 text-gray-600 cursor-pointer" :value="item.id" v-model="checked">
        </div>
    </div>
   </div>
  


  <!-- ADD OR CLOSE THE REQUEST -->
 
  <div class="fixed bottom-0 left-0 w-3/12 z-40 opacity-1 bg-gray-300">
    <div v-if="checked.length>0" class="flex justify-end  py-2 px-8 w-full font-serif">
      <button @click="$emit('emit_add', false)" class="text-[#464646] border-white hover:hover:bg-green-100 py-2 px-2 w-24">
          Cancel
      </button>
        <button @click="getCheckBox" class="text-[#454df3] border-white hover:bg-green-100 py-2 px-2 w-24 ">
            Add
        </button>
    </div>
  </div>
</template>

<script>
import axios  from 'axios'
export default {
  props:['listStudents'],
  emits:['emit_add', 'emit_id'],
  // emits:['emit_id', 'emit_id'],
 
  data(){
    return{
      checked:[],
      isChatID:'',
      avataImage: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4MmBOmXsxgjBhhfDh4FSeM9wsFRgC_2uPrE362dA&s',
      idOfStudent: "",
    }
  },
  methods: {
    getCheckBox(){
      // console.log(this.checked)
        for(let i = 0; i < this.checked.length; i++){
            let id = this.checked[i]
            console.log(id)
          axios.put('http://127.0.0.1:8000/api/get_follow_up/' + id, { if_follow_up: 'Yes' }).then(() => {})
        }
        // axios.post('http://127.0.0.1:8000/api/mailFollowUp/' + id, { id: id }).then(() => {})
        this.$emit('emit_add', false)
    },
    // GET CLASS ACTIVE
    getChat(id){
      this.isChatID = id;
      this.$emit('emit_id', id)
    },
  },
  mounted() {
    console.log(this.listStudents)
  }
};
</script>