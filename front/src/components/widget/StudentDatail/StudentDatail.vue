<template>
  <div class="w-1/3 border-l-2 px-5">
            <div class="flex flex-col">
              <div class="font-semibold text-xl py-4">Student Detail</div>
              <img
                src="https://source.unsplash.com/_7LbC5J-jw4/600x600"
                class="object-cover rounded-full h-50 w-50"
                alt=""
              />
              <div class="font-semibold py-4">
                <ul>
                  <li>First Name: MERN</li>
                  <li>Last Name: Stack</li>
                  <li>Class: WEB-A</li>
                  <li>Batch: 2022</li>
                  <li>Province: Kompong Thom</li>
                  <li>Gender: M</li>
                </ul>
              </div>
            </div>
          </div>
          
          <!-- <div class="p-2 h-44 w-44 flex justify-center items-center m-auto ">
            <img src="https://media.istockphoto.com/photos/its-a-paddle-board-time-picture-id1327654972?b=1&k=20&m=1327654972&s=170667a&w=0&h=jSof1Ye4RzBOJbu6ooY1vg08JrCdIm9U_2Nllrhfqow=" class="object-cover rounded-full h-36 w-36 border border-gray-400" alt=""/>
          </div> -->

          <!-- <div class="font-semibold py-4">
          <ul>
              <span>
                <li>First Name : </li>
                <li>{{ listUsers.first_name }}</li>
              </span>
              <span>
                <li>Last Name : </li>
                <li>{{ listUsers.last_name }}</li>
              </span>
              <span>
                <li>Class : </li>
                <li>{{ listUsers.class }}</li>
              </span>
              <span>
                <li>Batch : </li>
                <li>{{ listUsers.batch }}</li>
              </span>
              <span>
                <li>Province : </li>
                <li>{{ listUsers.province }}</li>
              </span>
              <span class="flex justify-between">
                <li>Gender : </li>
                <li>{{ listUsers.gender }}</li>
              </span>
            </ul>          
          </div> -->
        
    
</template>

<script>
export default {
    data(){
      return {
        listUsers: {first_name: 'Veangly', last_name: 'Kroh', class: 'WEB-2015', batch:'2022', province:'RTK', gender:'Male'},
      }
    }
}
</script>

<style scoped>
 li{
   font-size: 0.8em;
  
 }
 span{
  background: rgb(250, 249, 249);
  padding: 5px 15px;
  border: 1px solid rgb(245, 245, 245);
  cursor: pointer;
  display: flex;
  justify-content: space-between;
 }
</style> 