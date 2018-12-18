/**
 * Its a vuex store. It is implemeted to avoid sending multiple requests to backend and store repeated data at client-side instead.
 * It can alose be used to ease data management in nested components by simply writing component state to vuex and directly reading
 * from it instead of passing it to components
 * */

import Vue from 'vue';
import Vuex from 'vuex';

import profileSettings from './modules/profileSettings';


Vue.use(Vuex);

export const store = new Vuex.Store({
	
  modules:{
		    
        profileSettings,

	},
	
});