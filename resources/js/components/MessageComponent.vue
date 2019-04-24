<template>
    <div class="card card-default chat-box">
        <div class="card-header">
            <b :class="{'text-danger':session_block}">
                {{friend.name }}
                <span v-if="session_block">(Blocked)</span>
            </b>

            <!-- Close Button -->
            <a href="" @click.prevent="close">
                <i class="fas fa-times float-right"></i>
            </a>
            <!-- Close Button Ends --> 

            <!-- Options -->
            <div class="dropdown float-right mr-4">
                <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>  
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" v-if="session_block" @click.prevent="unblock">UnBlock</a>
                    <a class="dropdown-item" href="#" @click.prevent="block" v-else>Block</a>
                    <a class="dropdown-item" href="#" @click.prevent="clear">Clear Chat</a>                    
                </div>
            </div>
            <!-- Options Ends -->

        </div>
        <div class="card-body" v-chat-scroll>
            <p class="card-text" v-for="chat in chats" :key="chat.message">
                {{chat.message }}
            </p>
        </div>
        <form action="" class="card-footer" @submit.prevent="send">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Write your message here..."
                :disabled="session_block">
                
            </div>
        </form>
    </div>                
</template>

<script>
export default {
    props:['friend'], 
    data(){ 
        return { 
            chats:[],            
            session_block:false 
        }
    },
    methods: { 
        send(){ 
            console.log('yehhhhh')
        }, 
        close(){ 
           this.$emit('close'); 
        }, 
        clear(){ 
            this.chats= []
        }, 
        block(){ 
            this.session_block = true
        }, 
        unblock(){ 
            this.session_block = false
        }
    }, 
    created(){ 
        this.chats.push(
            {message:'Hey'},
            {message:'How are you1?'},
            {message:'How are you2?'},
            {message:'How are you3?'},
            {message:'How are you4?'},
            {message:'How are you5?'},
            {message:'How are you6?'},
            {message:'How are you7?'},
            {message:'How are you8?'},
            {message:'How are you9?'},
            {message:'How are you0?'},
            {message:'at the bottom'},
            {message:'at the bottom2'},

        
        )
    }
}
</script>

<style>
.chat-box{ 
    height: 400px; 
}
.card-body{ 
    overflow-y: scroll; 
}
</style>
