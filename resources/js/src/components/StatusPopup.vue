<template>
    <div>
        <!-- status popup -->
        <div class="status-popup fixed top-0 left-0 z-50 bg-black/70 w-full h-full flex justify-center items-center">
            <div class="popup-main max-w-[400px] min-w-[400px] rounded border border-gray-700 bg-[#0d1117]">
                <div class="popup-head px-5 flex justify-between items-center py-4 bg-white/5">
                    <h2 class="text-gray-300 text-sm font-medium">Edit Status</h2>
                    <button @click="closePopup">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400 hover:fill-blue-400">
                            <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                        </svg>
                    </button>
                </div>
                <div class="popup-top-bar w-full p-4 border-t border-b border-gray-700">
                    <div class="input-group flex">
                        <button class="border border-r-0 border-gray-700 w-[50px] rounded-md rounded-r-none bg-white/5 py-1">
                            <svg class="fill-gray-500 mx-auto" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zM5 8a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zM5.32 9.636a.75.75 0 011.038.175l.007.009c.103.118.22.222.35.31.264.178.683.37 1.285.37.602 0 1.02-.192 1.285-.371.13-.088.247-.192.35-.31l.007-.008a.75.75 0 111.222.87l-.614-.431c.614.43.614.431.613.431v.001l-.001.002-.002.003-.005.007-.014.019a1.984 1.984 0 01-.184.213c-.16.166-.338.316-.53.445-.63.418-1.37.638-2.127.629-.946 0-1.652-.308-2.126-.63a3.32 3.32 0 01-.715-.657l-.014-.02-.005-.006-.002-.003v-.002h-.001l.613-.432-.614.43a.75.75 0 01.183-1.044h.001z"></path>
                            </svg>
                        </button>
                        <input type="text" class="border border-gray-700 rounded-md w-full py-1 bg-dark-primary rounded-l-none focus:border-blue-400 focus:outline focus:ring-blue-400 px-3">
                    </div>
                    <div class="flex items-start mt-4">
                        <input type="checkbox" id="busy" class="rounded border border-gray-600" value="busy">
                        <div class="mt-[-5px] ml-2">
                            <label for="busy" class="inline-block mb-1 text-gray-200 text-[15px]">Busy</label>
                            <p class="text-xs text-gray-400">When others mention you, assign you, or request your review, GitHub will let them know that you have limited availability.</p>
                        </div>
                    </div>
                </div>
                <div class="popup-main px-5 py-4">
                    <div class="flex items-center gap-2">
                        <p class="text-gray-300 text-sm ">Clear status</p>
                        <div class="relative">
                            <button class="text-gray-400 rounded-md text-[12px] bg-white/5 border border-gray-700 flex justify-between items-center px-3" @click="clearTimeMenu = !clearTimeMenu">
                                <div class="flex gap-2 justify-between items-center">
                                    <span class="flex items-center font-semibold py-1">{{statusExpire}}</span>
                                </div>
                                <span class="ml-2 h-7 leading-[43px]"><span class="dropdown-caret "></span></span>
                            </button>
                            <div class="clear-dropdown absolute top-9 left-0 py-1 z-30 rounded bg-dark-primary border border-gray-700 w-[250px]" v-if="clearTimeMenu">
                                <ul>
                                    <li>
                                        <button class="group block text-left w-full px-3 py-2 text-gray-400 text-[13px] hover:bg-blue-500 hover:text-white" @click="setStatusExpire('Never')">
                                            <p class="text-gray-200">Never</p>
                                            <p class="text-gray-400 text-xs group-hover:text-gray-200">Keep this status until you clear your status or edit your status.</p>
                                        </button>
                                    </li>
                                    <li class="border-t border-gray-700 mt-2">
                                        <button class="group block text-left w-full px-3 py-1 text-gray-400 text-[13px] hover:bg-blue-500 hover:text-white" @click="setStatusExpire('in 30 minutes')">
                                            in 30 minutes
                                        </button>
                                    </li>
                                    <li>
                                        <button class="group block text-left w-full px-3 py-1 text-gray-400 text-[13px] hover:bg-blue-500 hover:text-white" @click="setStatusExpire('in 1 hour')">
                                            in 1 hour
                                        </button>
                                    </li>
                                    <li>
                                        <button class="group block text-left w-full px-3 py-1 text-gray-400 text-[13px] hover:bg-blue-500 hover:text-white" @click="setStatusExpire('in 4 hour')">
                                            in 4 hour
                                        </button>
                                    </li>
                                    <li>
                                        <button class="group block text-left w-full px-3 py-1 text-gray-400 text-[13px] hover:bg-blue-500 hover:text-white" @click="setStatusExpire('today')">
                                            today
                                        </button>
                                    </li>
                                    <li>
                                        <button class="group block text-left w-full px-3 py-1 text-gray-400 text-[13px] hover:bg-blue-500 hover:text-white" @click="setStatusExpire('this week')">
                                            this week
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-5 border-t border-gray-800 px-4">
                    <div class="flex items-center gap-2">
                        <button type="submit" class="hover:bg-green-600 bg-green-primary border border-gray-700 w-full px-3 py-1.5 text-sm rounded-md text-white flex items-center justify-center gap-x-1 font-medium">Set Status</button>
                        <button type="button" class="bg-transparent hover:bg-red-500 border border-gray-700 w-full px-3 py-1.5 text-sm rounded-md text-red-500 hover:text-white flex items-center justify-center gap-x-1 font-medium">Clear Status</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { usersStore } from '../stores/usersStore'
    export default {
        name: 'StatusPopup',
        setup() {
            const store = usersStore()

            return {
                // you can return the whole store instance to use it in the template
                store,
            }
        },
        data(){
            return{
                statusPopup: false,
                clearTimeMenu: false,
                statusExpire: 'Never',
            }
        },
        computed: {

        },
        mounted(){

        }, 
        methods: {
            // setStatus
            setStatusExpire(value){
                this.statusExpire = value
                this.clearTimeMenu = false
            }, 
            // close popup
            closePopup(){
                this.$emit('closePopup', true)
            }
        },
    }
</script>
