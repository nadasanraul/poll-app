<template>
   <chartjs-bar :datalabel="mylabel" :labels="oslabels" v-bind:data="mydata" :bind="true"></chartjs-bar>

</template>

<script>
export default {
  data() {
      return {
          votes: [],
          mylabel: 'OS Vote',
          oslabels: ['Windows', 'Linux', 'MacOS'],
          mydata: [],
      }
  },

  created(){
    this.getVotes();
  },

  methods: {
    getVotes(){
        axios.get('/api/votes').then((response) => {
            this.votes = response.data;
            // console.log(this.votes)
            let poll = this.votes.reduce((acc, vote) => (
                (acc[vote.option] = (acc[vote.option] || 0) + parseInt(vote.points)), acc), {}
                );
            this.mydata = [poll.Windows, poll.Linux, poll.MacOS];
            // console.log(poll);
        }).catch((err => {console.log(err)}));
    },
  }
}
</script>

