<template>
  <div class="custom-box">

    <div class="login-logo">
      
      <a><b>Build Your Profile</b></a>
      
      <h4>This information will let us know more about you.</h4>
    
    </div>

    <div class="login-box-body">

      <div class="nav-tabs-custom">
       
        <!-- nav header -->
        <ul class="nav nav-tabs">

          <li v-for="(tab,index) in tabs" id="profile_tab" :key="index" :class="{ active: currentTab === tab }">
            
            <a id="profile_tab" data-toggle="tab"  
               :class="{ active: currentTab === tab }" 
               @click="changeTab(tab)"> {{tab.toUpperCase()}} 
            </a>
          
          </li>

        </ul>

        <div class="tab-content">

          <div class="active tab-pane" id="activity">
              
            <component v-bind:is="currentTabComponent"></component>
          
          </div>
              
        </div>

    </div>  
  </div>

    </div>

</div>

</template>

<script>
    export default {

      name : 'profile-component',

      description : 'User profile component',

      data(){
        return {

          tabs:['about','account','address'],
        
          currentTab:'about',

        }
      },

      watch : {
        currentTab(newValue,oldValue){
          return newValue
        }
      },

      computed:{
        currentTabComponent(){
          return this.currentTab === 'about' ? 'about-component' : this.currentTab === 'account' ? 'account-component' : 'address-component';
        }
      },

      created() {
          
          window.eventHub.$on('showAccountTab',this.changeTab);
          
          window.eventHub.$on('showAboutTab',this.changeTab);

          window.eventHub.$on('showAddressTab', this.changeTab);
      
      },

      methods :{
        changeTab(tab){
          this.currentTab = tab
        },
      },

      components : {

        "about-component": require('./MiniComponents/About.vue'),
        
        "account-component": require('./MiniComponents/Account.vue'),

        "address-component": require('./MiniComponents/Address.vue'),

      },

    };
</script>
<style scoped>
  .custom-box{
    width: 1000px;
    margin: 7% auto;
  }
  #profile_tab .active {
    background: #0c9a0c !important;
    color: white !important;
  }
  #profile_tab{
    border: none !important;
    width: 200px;
    text-align: center;
  }
</style>