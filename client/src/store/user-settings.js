import axios from "axios";
import authHeader from "@/services/auth.header";

export const userSettings = {
    namespaced: true,
    state: {
        initialValues: {
            breeds: [],
            genders: []
        },
        model: {
            user_id: null,
            radius_meters: null,
            pref_breeds: null,
            age_from: null,
            age_to: null
        }
    },
    actions: {
        getModel({commit}, userId) {
            axios.get('/user-setting/' + userId, {headers: authHeader()})
                .then(response => {
                    commit('updateModel', response.data)
                })
        },
        getInitialValues({commit}) {
            axios.get('/breed/initial-value', {headers: authHeader()})
                .then(response => {
                    commit('update', response.data)
                })
        },
    },
    mutations: {
        updateModel(state, model) {
            state.model = model;
        },
        updateInitialValues(state, initialValues) {
            state.initialValues = initialValues;
        },
    }
};
