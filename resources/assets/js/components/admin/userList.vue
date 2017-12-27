<template>
	<table class="table table-striped">
	    <thead>
	        <tr>
	            <th>Name</th>
	            <th>Email</th>
	            <th>Age</th>
	            <th>Department</th>
	            <th>Actions</th>
	        </tr>
	    </thead>
	    <tbody>
	        <tr v-for="user in users"  :key="user.id" :class="{activerow: editingUser === user}">
	            <td>{{ user.name }}</td>
	            <td>{{ user.email }}</td>
	            <td>
					<a class="btn btn-xs btn-primary" v-on:click.prevent="blockUser(user)">Block</a>
	                <a class="btn btn-xs btn-success" v-on:click.prevent="reativeUser(user)">UnBlock</a>
	                <a class="btn btn-xs btn-danger" v-on:click.prevent="removeUser(user)">Remove</a>
	            </td>
	        </tr>
	    </tbody>
	</table>
</template>

<script type="text/javascript">
	// Component code (not registered)
	module.exports={
		props: ['users'],
		data: function(){
			return { 
				editingUser: null
			}
		},
        methods: {
            reativeUser: function(user){

            },		
            removeUser: function(user){
                this.editingUser = null;
                this.$emit('delete-click', user);
			},
			blockUser: function(user){
				this.editingUser = null;
				this.$emit('block-click', user);
			}
        },		
	}
</script>

<style scoped>
	tr.activerow {
  		background: #123456  !important;
  		color: #fff          !important;
}

</style>