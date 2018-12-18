/**
 * Handles all the alerts displayed on the screen.
 * It contains all the messages for 5 seconds which can be used to display those messages on the screen
 *
 * NOTE: there cannot be multiple alerts in the store
 */

const state = {
	about : {},
	account : []
};


const getters = {

	getAccountDetails(state){ 
		return state.account
	},

	 getAboutDetails(state){
        return state.about
    },

	
};


const mutations = {

	about(state, payload) {
		state.about = payload;
	},


	account(state, payload) {
		state.account = payload
	}


};


const actions = {

	setAboutData({ commit }, payload) {
		commit('about', payload)
	},

	setAccountData({ commit }, payload) {
		commit('account', payload)
	},

}


export default { state, getters, mutations, actions }