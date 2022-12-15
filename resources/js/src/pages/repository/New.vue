<template>
    <div>
        <div class="empty-repo-details py-7 2xl:w-5/12 xl:w-6/12 lg:w-8/12 md:w-9/12 w-full mx-auto xl:px-10 px-5">
            <h2 class="text-gray-300 font-medium mb-1 text-[22px] mt-2">Create new Repository</h2>
            <p class="text-gray-400 text-sm">A repository contains all project files, including the revision history. Already have a project repository elsewhere? <a href="#" class="text-blue-400 hover:underline underline-offset-2">Import a repository</a>.</p>
            <div class="py-5 border-y border-gray-800 mt-7">
                <div class="flex sm:flex-row flex-col sm:items-end gap-3">
                    <div class="left sm:w-auto w-full">
                        <label class="text-gray-300 font-medium block mb-2">Owner <span class="text-red-500">*</span></label>
                        <div class="owner-detail">
                            <button class="flex items-center px-3 py-1.5 bg-white/5 rounded border border-gray-700">
                                <img :src="loggedInUser.avatar_url" :alt="loggedInUser.login" class="w-5 h-5 rounded-full">
                                <h4 class="text-gray-300 text-[14px] ml-2">{{loggedInUser.login}}</h4>
                            </button>
                        </div>
                    </div>
                    <p class="text-gray-200 text-2xl sm:block hidden">/</p>
                    <div class="right">
                        <label class="text-gray-300 font-medium block mb-2">Repository <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1.5 text-sm rounded bg-dark-main text-gray-300 sm:min-w-[300px] w-full" v-model="repo.name">
                    </div>
                </div>
                <p class="text-gray-400 text-[14px] mt-3">Great repository names are short and memorable. Need inspiration? How about psychic-octo-umbrella?</p>
                <div class="form-group mt-3">
                    <label class="text-gray-300 font-medium block mb-2 text-sm">Description <span class="text-gray-400 text-xs">(optional) </span></label>
                    <input type="text" placeholder="" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1.5 text-sm rounded w-full bg-dark-main text-gray-300 min-w-[300px]">
                </div>
            </div>
            <div class="py-1 border-b border-gray-800">
                <div class="form-group flex items-start gap-2 mb-3">
                    <input type="radio" id="public" name="type" value="public" class="mt-1.5 w-3.5 h-3.5 bg-gray-400 border border-gray-500 accent-emerald-600" v-model="repo.type">
                    <label for="public" class="flex items-start gap-x-2">
                        <svg aria-hidden="true" height="36" viewBox="0 0 24 24" version="1.1" width="24" data-view-component="true" class="fill-gray-400">
                            <path fill-rule="evenodd" d="M3 2.75A2.75 2.75 0 015.75 0h14.5a.75.75 0 01.75.75v20.5a.75.75 0 01-.75.75h-6a.75.75 0 010-1.5h5.25v-4H6A1.5 1.5 0 004.5 18v.75c0 .716.43 1.334 1.05 1.605a.75.75 0 01-.6 1.374A3.25 3.25 0 013 18.75v-16zM19.5 1.5V15H6c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H19.5z"></path>
                            <path d="M7 18.25a.25.25 0 01.25-.25h5a.25.25 0 01.25.25v5.01a.25.25 0 01-.397.201l-2.206-1.604a.25.25 0 00-.294 0L7.397 23.46a.25.25 0 01-.397-.2v-5.01z"></path>
                        </svg>
                        <div class="mt-0.5">
                            <p class="text-gray-300 text-sm mb-1">Public</p>
                            <p class="text-gray-500 text-xs">Anyone on the internet can see this repository</p>
                        </div>
                    </label>
                </div>
                <div class="form-group flex items-start gap-2 mb-3">
                    <input type="radio" id="private" name="type" value="private" class="mt-1.5 w-3.5 h-3.5 bg-gray-400 border border-gray-500 accent-emerald-600" v-model="repo.type">
                    <label for="private" class="flex items-start gap-x-2">
                        <svg aria-hidden="true" height="36" viewBox="0 0 24 24" version="1.1" width="24" data-view-component="true" class="fill-gray-400">
                            <path fill-rule="evenodd" d="M6 9V7.25C6 3.845 8.503 1 12 1s6 2.845 6 6.25V9h.5a2.5 2.5 0 012.5 2.5v8a2.5 2.5 0 01-2.5 2.5h-13A2.5 2.5 0 013 19.5v-8A2.5 2.5 0 015.5 9H6zm1.5-1.75C7.5 4.58 9.422 2.5 12 2.5c2.578 0 4.5 2.08 4.5 4.75V9h-9V7.25zm-3 4.25a1 1 0 011-1h13a1 1 0 011 1v8a1 1 0 01-1 1h-13a1 1 0 01-1-1v-8z"></path>
                        </svg>
                        <div class="mt-0.5">
                            <p class="text-gray-300 text-sm mb-1">Private</p>
                            <p class="text-gray-500 text-xs">You choose who can see and commit to this repository</p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="py-2 border-b border-gray-800">
                <p class="text-gray-300 font-medium block mb-1 text-sm">Initialize this repository with:</p>
                <p class="text-gray-400 font-medium block mb-2 text-sm">Skip this step if you’re importing an existing repository.</p>
                <div class="flex items-start my-4">
                    <input type="checkbox" id="readme" class="rounded border border-gray-600 accent-emerald-600" value="yes" v-model="repo.readme">
                    <div class="mt-[-5px] ml-2">
                        <label for="readme" class="inline-block mb-1 text-gray-200 text-[15px]">Add a README file</label>
                        <p class="text-xs text-gray-400">This is where you can write a long description for your project. <a href="#" class="text-blue-400 hover:underline underline-offset-2">Learn more.</a></p>
                    </div>
                </div>
                <!-- gitignore template -->
                <p class="inline-block mb-1 text-gray-200 text-[15px]">Add .gitignore</p>
                <p class="text-xs text-gray-400">Choose which files not to track from a list of templates. <a href="#" class="text-blue-400 hover:underline underline-offset-2">Learn more.</a></p>
                <div class="gitignore-template my-3 relative">
                    <button class="w-auto lg:px-4 px-2 lg:py-1.5 py-1 text-gray-400 border border-gray-700 rounded-md text-[12px] hover:border-gray-400 bg-white/5 flex justify-center items-center gap-2" @click="gitignoreTemplateMenu = !gitignoreTemplateMenu; licenceMenu = false">
                        <span class="flex items-center font-semibold">.gitignore template: <span class="truncate max-w-[100px]">{{gitignoreTemplateValue}}</span> <span class="dropdown-caret ml-2"></span></span>
                    </button>
                    <!-- dropdown -->
                    <div class="clear-dropdown absolute top-9 left-0 z-30 rounded bg-dark-primary border border-gray-700 w-[350px]" v-if="gitignoreTemplateMenu">
                        <div class="template-head px-3 flex justify-between items-center py-2 bg-white/5">
                            <h2 class="text-gray-300 text-sm font-medium">.gitignore template</h2>
                            <button @click="gitignoreTemplateMenu = false">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400 hover:fill-blue-400">
                                    <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="template-search py-3 border-y border-gray-800">
                            <div class="form-group px-3">
                                <input type="text" placeholder="Filter" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300">
                            </div>
                        </div>
                        <div class="tempates pb-3 px-3 max-h-[200px] overflow-y-auto">
                            <div class="single-template py-1.5 border-b border-gray-800 flex items-center cursor-pointer" v-for="(template,index) in gitignoreTemplates" :key="index" @click="setGitIgnoretemplate(template)">
                                <svg v-if="gitignoreTemplateValue == template" aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                </svg>
                                <h4 :class="[gitignoreTemplateValue == template ? ' pl-3' : ' pl-7', 'text-gray-400 text-[13px] font-medium']">{{template}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- license -->
                <p class="inline-block mb-1 text-gray-200 text-[15px]">Choose a license</p>
                <p class="text-xs text-gray-400">A license tells others what they can and can't do with your code. <a href="#" class="text-blue-400 hover:underline underline-offset-2">Learn more.</a></p>
                <div class="license-template my-3 relative">
                    <button class="w-auto lg:px-4 px-2 lg:py-1.5 py-1 text-gray-400 border border-gray-700 rounded-md text-[12px] hover:border-gray-400 bg-white/5 flex justify-center items-center gap-2" @click="licenceMenu = !licenceMenu; gitignoreTemplateMenu = false">
                        <span class="flex items-center font-semibold ">Licence: <span class="truncate max-w-[100px]"> {{licenceValue.name}}</span> <span class="dropdown-caret ml-2"></span></span>
                    </button>
                    <!-- dropdown -->
                    <div class="clear-dropdown absolute top-9 left-0 z-30 rounded bg-dark-primary border border-gray-700 w-[350px]" v-if="licenceMenu">
                        <div class="template-head px-3 flex justify-between items-center py-2 bg-white/5">
                            <h2 class="text-gray-300 text-sm font-medium">Licence</h2>
                            <button @click="licenceMenu = false">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400 hover:fill-blue-400">
                                    <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="template-search py-3 border-y border-gray-800">
                            <div class="form-group px-3">
                                <input type="text" placeholder="Filter" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300">
                            </div>
                        </div>
                        <div class="tempates pb-3 px-3 max-h-[200px] overflow-y-auto">
                            <div class="single-template py-1.5 border-b border-gray-800 flex items-center cursor-pointer" v-for="(licence,index) in licences" :key="index" @click="setlicence(licence)">
                                <svg v-if="licenceValue == licence" aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                </svg>
                                <h4 :class="[licenceValue == licence ? ' pl-3' : ' pl-7', 'text-gray-400 text-[13px] font-medium']">{{licence.name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- add readme.md text -->
                <p class="text-gray-400 font-medium mb-2 text-sm gap-2" v-if="repo.readme">
                    This will set
                    <span class="inline-flex gap-1 px-1 py-0.5 rounded bg-slate-900">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                            <path fill-rule="evenodd" d="M11.75 2.5a.75.75 0 100 1.5.75.75 0 000-1.5zm-2.25.75a2.25 2.25 0 113 2.122V6A2.5 2.5 0 0110 8.5H6a1 1 0 00-1 1v1.128a2.251 2.251 0 11-1.5 0V5.372a2.25 2.25 0 111.5 0v1.836A2.492 2.492 0 016 7h4a1 1 0 001-1v-.628A2.25 2.25 0 019.5 3.25zM4.25 12a.75.75 0 100 1.5.75.75 0 000-1.5zM3.5 3.25a.75.75 0 111.5 0 .75.75 0 01-1.5 0z"></path>
                        </svg>
                        main
                    </span>
                    as the default branch. Change the default name in your <a href="#" class="text-blue-400 hover:underline underline-offset-2">settings.</a>
                </p>
            </div>

            <div class="py-2 border-b border-gray-800">
                <p class="text-gray-400 font-medium mb-2 text-sm flex items-center gap-2">
                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-600">
                        <path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8zm6.5-.25A.75.75 0 017.25 7h1a.75.75 0 01.75.75v2.75h.25a.75.75 0 010 1.5h-2a.75.75 0 010-1.5h.25v-2h-.25a.75.75 0 01-.75-.75zM8 6a1 1 0 100-2 1 1 0 000 2z"></path>
                    </svg>
                    You are creating a {{repo.type}} repository in your personal account.
                </p>
            </div>

            <div class="pt-4">
                <button type="button" class="bg-green-primary px-5 py-1.5 text-sm rounded-md text-white flex items-center justify-center gap-x-1" :disabled="repo.name ? false : true">
                   <span>Create repository</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { usersStore } from '../../stores/usersStore'
import { Octokit } from "@octokit/core";
export default {
    name: 'CreateRepository',
    data(){
        return{
            loggedInUser: '',
            repo: {
                type: 'public',
            },
            gitignoreTemplateMenu: false,
            gitignoreTemplates: [],
            gitignoreTemplateValue: '',
            licenceMenu: false,
            licences: [],
            licenceValue: '',
        }
    },
    setup() {
        const store = usersStore()

        return {
            // you can return the whole store instance to use it in the template
            store,
        }
    },
    mounted(){
        this.getloggedInUser();
        this.getGitIgnoreTemplates();
        this.getLicences();
    }, 
    methods: {
        getloggedInUser(){
            this.store.getUser()
            setTimeout(() => {
                this.loggedInUser = this.store.gitHubUser
            }, 800)
        },
        // get gitignore templates
        async getGitIgnoreTemplates(){
            const octokit = new Octokit({
                auth: this.store.user.access_token
            })

            let noneValue= ['None']
            await octokit.request('GET /gitignore/templates', {})
            .then((res) => {
                this.gitignoreTemplates = [ ...noneValue, ...res.data]
                this.gitignoreTemplateValue = this.gitignoreTemplates[0]
            }).catch((err) => {
                console.log(err)
            })
        },
        // set gitignore template
        setGitIgnoretemplate(value){
            this.gitignoreTemplateValue = value
            this.gitignoreTemplateMenu = false
        },
        // get licences
        async getLicences(){
            const octokit = new Octokit({
                auth: this.store.user.access_token
            })

            let noneValue= [{ key: 'none', name: 'None'}]

            await octokit.request('GET /licenses{?featured,per_page,page}', {})
            .then((res) => {
                this.licences = [ ...noneValue, ...res.data]
                this.licenceValue = this.licences[0]
            }).catch((err) => {
                console.log(err)
            })
        },
        // set licence
        setlicence(value){
            this.licenceValue = value
            this.licenceMenu = false
        }
    },
}
</script>
