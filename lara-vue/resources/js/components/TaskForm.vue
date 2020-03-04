<template>
    <div class="col-md-8 mt-5">
        <div class="card">
            <div class="card-header">Task Form</div>
                <div class="card-body">
                    <form action="./api/task" method="POST" @submit.prevent="addTask()">
                        <div class="form-group">
                            <input type="text" name="title" v-model="title" placeholder="Task Title" class="form-control">
                            <div class="invalide-feedback">
                                {{errors.get('title')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Add Task">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</template>

<script>
  
  class Errors{
      constructor(){
          this.errors = {};
      }
      get(field) {
          if(this.errors[field]){
              return this.errors[field][0];
          }
      }

      record(errors) {
          this.errors = errors.errors
      }
  }
    export default{
        data(){
          return {
              title: '',
              errors: new Errors
          }
        },
        methods:{
             addTask(){ 
                 axios.post('./api/task', {title: this.title}).then(function() {
                    Event.$emit('taskCreated', {title: this.title});
                    this.title = ''
                 }).catch(error => this.errors.record(error.response.data));
             }
        }
    }
</script>