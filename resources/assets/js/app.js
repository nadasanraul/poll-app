
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// chartjs package
require('chart.js');
// vue-charts package
require('hchs-vue-charts');
Vue.use(VueCharts);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('poll-component', require('./components/PollComponent.vue'));

const app = new Vue({
    el: '#app',

    data: {
        votes: [],
        mylabel: 'OS Vote',
        oslabels: ['Windows', 'Linux', 'MacOS'],
        mydata: []
    },

    created() {
        this.getVotes()
    },

    methods: {
        addVote(){
            const choice = document.querySelector('input[name=option]:checked').value
            const data = {
                option: choice,
                points: 1
            }
            // console.log(data);
            axios.post('/api/votes', data).then((res) => {
                return true;
            })
            this.getVotes();
        },

        getVotes(){
            axios.get('/api/votes').then((response) => {
                this.votes = response.data;
                // console.log(this.votes)
                let poll = this.votes.reduce((acc, vote) => (
                    (acc[vote.option] = (acc[vote.option] || 0) + parseInt(vote.points)), acc), {}
                    );
                let num = [];
                console.log(Object.entries(poll));
                
                this.oslabels.forEach((oslabel) => {
                    Object.entries(poll).forEach(([key, val]) => {
                        if(oslabel == key){
                            num.push(val);
                        };
                        // console.log(this.mydata);
                        // console.log(key);
                        // console.log(val);
                    })
                })
                this.mydata = num;
                console.log(this.mydata)
                // console.log(poll);
            }).catch((err => {console.log(err)}));
        }
    }
});
