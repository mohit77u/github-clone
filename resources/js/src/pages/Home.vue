<template>
<div>

    <!-- main -->
    <section class="main flex flex-wrap bg-dark-main min-h-screen">
        <!-- sidebar -->
        <SideBar :refresh="refresh" />

        <!-- main -->
        <div class="main-right-content bg-dark-main flex-auto px-8 py-5 md:w-[calc(100%-250px)] lg:w-[calc(100%-350px)] w-full">
            <div class="flex flex-wrap">
                <!-- left side main content -->
                <div class="xl:w-8/12 w-full xl:pr-6 pr-0">

                    <!-- top heading main -->
                    <div class="top">
                        <h1 class="text-gray-300 text-[32px] font-semibold mb-3">The home for all developers — including you.</h1>
                        <p class="text-gray-400 text-sm mb-3 leading-6">Welcome to your personal dashboard, where you can find an introduction to how GitHub works, tools to help you build software, and help merging your first lines of code.</p>
                    </div>

                    <!-- create and readme top bar -->
                    <div class="flex justify-between items-center mt-4">
                        <div class="top flex items-center gap-x-2">
                            <div class="icon bg-gray-400 w-8 h-8 text-center leading-8 rounded-full">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="15" data-view-component="true" class="h-full mx-auto fill-gray-500">
                                    <path fill-rule="evenodd" d="M4.72 3.22a.75.75 0 011.06 1.06L2.06 8l3.72 3.72a.75.75 0 11-1.06 1.06L.47 8.53a.75.75 0 010-1.06l4.25-4.25zm6.56 0a.75.75 0 10-1.06 1.06L13.94 8l-3.72 3.72a.75.75 0 101.06 1.06l4.25-4.25a.75.75 0 000-1.06l-4.25-4.25z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500 text-sm">Start writing code</p>
                        </div>
                        <div class="top flex flex-end">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- main grid create readme -->
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                        <div class="left create">
                            <div class="create-main my-3 border border-gray-800 bg-white/5 rounded px-4 pt-4 h-full">
                                <h4 class="text-gray-300 font-medium mb-3 text-[16px]">Start a new repository</h4>
                                <p class="text-gray-400 text-[14px] mb-3 leading-6">A repository contains all of your project's files, revision history, and collaborator discussion.</p>

                                <!-- form top -->
                                <form @submit.prevent="CreateRepo">
                                    <div class="form-top flex items-center gap-x-1">
                                        <p class="text-gray-300 text-sm">{{githubUser.login ? githubUser.login : user.username}}/</p>
                                        <input type="text" placeholder="name your new repository..." class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="repo.name">
                                    </div>

                                <!-- create form -->
                                    <div class="form-group flex items-start gap-2 mb-3 mt-4">
                                        <input type="radio" id="public" name="type" value="public" class="mt-1.5 w-3.5 h-3.5 bg-gray-400 border border-gray-500" v-model="repo.type">
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
                                        <input type="radio" id="private" name="type" value="private" class="mt-1.5 w-3.5 h-3.5 bg-gray-400 border border-gray-500" v-model="repo.type">
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
                                    <div class="form-group my-5">
                                        <button type="submit" class="bg-green-primary px-3 py-1.5 text-white font-semibold rounded text-xs">Create a new repository</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="right">
                            <div class="create-main my-3 border border-gray-800 bg-white/5 rounded px-4 pt-4 pb-8 h-full">
                                <h4 class="text-gray-300 font-medium mb-3 text-[16px]">Introduce yourself with a profile README</h4>
                                <p class="text-gray-400 text-[14px] mb-3 leading-6">Share information about yourself by creating a profile README, which appears at the top of your profile page.</p>

                                <div class="readme border border-gray-800 rounded-md mt-3">
                                    <!-- form top -->
                                    <div class="form-top flex items-center justify-between px-3 py-2">
                                        <p class="text-gray-300 text-sm">{{githubUser.login ? githubUser.login : user.username}} / README.md</p>
                                        <button class="bg-green-primary px-3 py-1.5 text-white font-semibold rounded text-xs">Create</button>
                                    </div>
                                    <div class="readme-content px-3 bg-white/5">
                                        <article class="py-2">
                                            <div class="flex items-center">
                                                <span class="blob-num pinned-gist-blob-num text-gray-400 text-[13px]">1</span>
                                                <pre class="lh-condensed-ultra overflow-hidden text-gray-300 text-[13px]"> - 👋 Hi, I’m @{{githubUser.login ? githubUser.login : user.username}}</pre>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="blob-num pinned-gist-blob-num text-gray-400 text-[13px]">2</span>
                                                <pre class="lh-condensed-ultra overflow-hidden text-gray-300 text-[13px]"> - 👀 I’m interested in ...</pre>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="blob-num pinned-gist-blob-num text-gray-400 text-[13px]">3</span>
                                                <pre class="lh-condensed-ultra overflow-hidden text-gray-300 text-[13px]"> - 🌱 I’m currently learning ...</pre>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="blob-num pinned-gist-blob-num text-gray-400 text-[13px]">4</span>
                                                <pre class="lh-condensed-ultra overflow-hidden text-gray-300 text-[13px]"> - 💞️ I’m looking to collaborate on ...</pre>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="blob-num pinned-gist-blob-num text-gray-400 text-[13px]">5</span>
                                                <pre class="lh-condensed-ultra overflow-hidden text-gray-300 text-[13px]"> - 📫 How to reach me ...</pre>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="blob-num pinned-gist-blob-num text-gray-400 text-[13px]">6</span>
                                                <pre class="lh-condensed-ultra overflow-hidden text-gray-300 text-[13px]"></pre>
                                            </div>
                                        </article>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- downlaod and info top bar -->
                    <div class="flex justify-between items-center mt-8">
                        <div class="top flex items-center gap-x-2">
                            <div class="icon bg-gray-400 w-8 h-8 text-center leading-8 rounded-full">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="15" data-view-component="true" class="h-full mx-auto fill-gray-500">
                                    <path fill-rule="evenodd" d="M5.433 2.304A4.494 4.494 0 003.5 6c0 1.598.832 3.002 2.09 3.802.518.328.929.923.902 1.64v.008l-.164 3.337a.75.75 0 11-1.498-.073l.163-3.33c.002-.085-.05-.216-.207-.316A5.996 5.996 0 012 6a5.994 5.994 0 012.567-4.92 1.482 1.482 0 011.673-.04c.462.296.76.827.76 1.423v2.82c0 .082.041.16.11.206l.75.51a.25.25 0 00.28 0l.75-.51A.25.25 0 009 5.282V2.463c0-.596.298-1.127.76-1.423a1.482 1.482 0 011.673.04A5.994 5.994 0 0114 6a5.996 5.996 0 01-2.786 5.068c-.157.1-.209.23-.207.315l.163 3.33a.75.75 0 11-1.498.074l-.164-3.345c-.027-.717.384-1.312.902-1.64A4.496 4.496 0 0012.5 6a4.494 4.494 0 00-1.933-3.696c-.024.017-.067.067-.067.16v2.818a1.75 1.75 0 01-.767 1.448l-.75.51a1.75 1.75 0 01-1.966 0l-.75-.51A1.75 1.75 0 015.5 5.282V2.463c0-.092-.043-.142-.067-.159zm.01-.005z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500 text-sm">Use tools of the trade</p>
                        </div>
                        <div class="top flex flex-end">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- main grid info readme -->
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                        <div class="left my-3 border border-gray-800 bg-white/5 rounded px-4 py-4">
                            <h4 class="text-gray-300 font-medium mb-3 text-[16px]">Simplify your development workflow with a GUI</h4>
                            <div class="content flex items-start">
                                <img src="/images/gh-desktop.png" alt="desktop" class="max-w-[60px]">
                                <p class="text-gray-400 text-[14px] ml-2 mt-1"><a href="https://desktop.github.com" target="blank" class="text-blue-500 hover:underline underline-offset-2">Install GitHub Desktop</a> to visualize, commit, and push changes without ever touching the command line.</p>
                            </div>
                        </div>
                        <div class="right my-3 border border-gray-800 bg-white/5 rounded px-4 py-4">
                            <h4 class="text-gray-300 font-medium mb-3 text-[16px]">Get AI-based coding suggestions</h4>
                            <div class="content flex items-start">
                                <img src="/images/copilot.jpg" alt="desktop" class="max-w-[60px]">
                                <p class="text-gray-400 text-[14px] ml-2 mt-1"><a href="https://github.com/github-copilot/signup" target="blank" class="text-blue-500 hover:underline underline-offset-2">Try GitHub Copilot free for 60 days, </a> which suggests code and entire functions in real-time, right from your editor.</p>
                            </div>
                        </div>
                    </div>

                    <!-- get started follow bar -->
                    <div class="flex justify-between items-center mt-8">
                        <div class="top flex items-center gap-x-2">
                            <div class="icon bg-gray-400 w-8 h-8 text-center leading-8 rounded-full">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="15" data-view-component="true" class="h-full mx-auto fill-gray-500">
                                    <path fill-rule="evenodd" d="M7.693 1.066a.75.75 0 01.614 0l7.25 3.25a.75.75 0 010 1.368L13 6.831v2.794c0 1.024-.81 1.749-1.66 2.173-.893.447-2.075.702-3.34.702-.278 0-.55-.012-.816-.036a.75.75 0 01.133-1.494c.22.02.45.03.683.03 1.082 0 2.025-.221 2.67-.543.69-.345.83-.682.83-.832V7.503L8.307 8.934a.75.75 0 01-.614 0L4 7.28v1.663c.296.105.575.275.812.512.438.438.688 1.059.688 1.796v3a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75v-3c0-.737.25-1.358.688-1.796.237-.237.516-.407.812-.512V6.606L.443 5.684a.75.75 0 010-1.368l7.25-3.25zM2.583 5L8 7.428 13.416 5 8 2.572 2.583 5zM2.5 11.25c0-.388.125-.611.25-.735a.704.704 0 01.5-.203c.19 0 .37.071.5.203.125.124.25.347.25.735v2.25H2.5v-2.25z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500 text-sm">Get started on GitHub</p>
                        </div>
                        <div class="top flex flex-end">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- main grid info readme -->
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                        <div class="left my-3 border border-gray-800 bg-white/5 rounded relative overflow-hidden">
                            <a href="https://www.youtube.com/watch?v=pBy1zgt0XPc" target="blank"><img src="/images/video-thumbnail.jpeg" alt="video" class="w-full max-h-[240px] h-full object-cover transition-all duration-300 hover:scale-105"></a>
                            <a href="https://www.youtube.com/watch?v=pBy1zgt0XPc" target="blank" class="start-button absolute left-4 bottom-2 w-auto px-3 py-1.5 text-white text-[14px] bg-blue-500 font-semibold">What is GitHub?</a>
                            <a href="https://www.youtube.com/watch?v=pBy1zgt0XPc" target="blank" class="icon absolute top-[100px] left-1/2">
                                <svg aria-hidden="true" height="30" viewBox="0 0 24 24" version="1.1" width="30" data-view-component="true" class="bg-blue-500 fill-gray-100 rounded-full">
                                    <path d="M9.5 15.584V8.416a.5.5 0 01.77-.42l5.576 3.583a.5.5 0 010 .842l-5.576 3.584a.5.5 0 01-.77-.42z"></path><path fill-rule="evenodd" d="M12 2.5a9.5 9.5 0 100 19 9.5 9.5 0 000-19zM1 12C1 5.925 5.925 1 12 1s11 4.925 11 11-4.925 11-11 11S1 18.075 1 12z"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="right my-3 border border-gray-800 bg-white/5 rounded px-4 pt-4 pb-4">
                            <div class="content">
                                <svg aria-hidden="true" height="24" viewBox="0 0 24 24" version="1.1" width="24" data-view-component="true" class="fill-gray-500">
                                    <path fill-rule="evenodd" d="M4.75 3a1.75 1.75 0 100 3.5 1.75 1.75 0 000-3.5zM1.5 4.75a3.25 3.25 0 116.5 0 3.25 3.25 0 01-6.5 0zM4.75 17.5a1.75 1.75 0 100 3.5 1.75 1.75 0 000-3.5zM1.5 19.25a3.25 3.25 0 116.5 0 3.25 3.25 0 01-6.5 0zm17.75-1.75a1.75 1.75 0 100 3.5 1.75 1.75 0 000-3.5zM16 19.25a3.25 3.25 0 116.5 0 3.25 3.25 0 01-6.5 0z"></path><path fill-rule="evenodd" d="M4.75 7.25A.75.75 0 015.5 8v8A.75.75 0 014 16V8a.75.75 0 01.75-.75zm8.655-5.53a.75.75 0 010 1.06L12.185 4h4.065A3.75 3.75 0 0120 7.75v8.75a.75.75 0 01-1.5 0V7.75a2.25 2.25 0 00-2.25-2.25h-4.064l1.22 1.22a.75.75 0 01-1.061 1.06l-2.5-2.5a.75.75 0 010-1.06l2.5-2.5a.75.75 0 011.06 0z"></path>
                                </svg>
                                <h4 class="text-gray-300 font-medium mb-2 mt-3 text-[16px]">Follow this exercise to try the GitHub flow</h4>
                                <p class="text-gray-400 text-[14px] mb-3">GitHub's “Hello World” tutorial teaches you essentials, where you create your own repository and learn GitHub's pull request workflow for creating and reviewing code.</p>
                                <a href="https://docs.github.com/get-started/quickstart/github-flow" target="blank" class="text-gray-300 w-auto bg-white/5 border border-gray-700 rounded px-3 py-1 inline-block text-[14px] hover:border-gray-400">Try the GitHub now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right side main content -->
                <div class="xl:w-4/12 w-full xl:pl-6 pl-0">
                    <div class="right my-3 border border-[#30363d] bg-white/5 rounded relative ">
                        <div class="content px-4 pt-3 pb-7 bg-content">
                            <h4 class="text-gray-300 font-medium mb-2 mt-2 text-[16px]">Start coding instantly with GitHub Codespaces</h4>
                            <p class="text-gray-400 text-[13px] mt-4 mb-7 w-8/12">Spin up fully configured dev environments on powerful VMs that start in seconds. Get up to 60 hours a month of free time.</p>
                            <a href="https://github.com/codespaces" target="blank" class="w-full text-gray-200 bg-white/10 border border-purple-800 rounded px-3 py-1 inline-block text-[14px] text-center mt-3 hover:bg-white/5">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- connect gitHub popup -->
    <div class="connect-popup fixed top-0 left-0 z-40 bg-black/70 w-full h-full flex justify-center items-center" v-if="connect">
        <div class="popup-main max-w-[350px] min-w-[350px] rounded border border-gray-700 bg-[#0d1117] py-5">
            <div class="popup-head px-5 flex justify-between items-center">
                <h2 class="text-white text-sm pb-1.5">Connect GitHub</h2>
            </div>
            <div class="popup-top-bar mt-4 w-full p-4 border-t border-b border-[rgba(187,128,9,0.4)] bg-gradient-to-b from-[rgba(187,128,9,0.15)] to-[rgba(187,128,9,0.15)]">
                <p class="text-gray-400 text-sm">Connect your GitHub account now.</p>
            </div>
            <div class="popup-main px-5">
                <p class="text-gray-300 text-sm pt-4">Enter your GitHub personal access token to connect with your account, and you can perform any actions that will reflect to your GitHub account.</p>
                <form @submit.prevent="updateToken" class="py-4">
                    <div class="form-group">
                        <label class="block mb-1 text-gray-300 text-sm">Please type your personal access token</label>
                        <input type="text" placeholder="" class="my-2 border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="user.token">
                        <p v-if="error.token" class="text-red-500 text-xs mb-2">{{ error.token[0]}}</p>
                        <button type="submit" class="bg-transparent hover:bg-green-primary border border-gray-700 w-full px-3 py-1.5 text-sm rounded-md text-green-primary hover:text-white flex items-center justify-center gap-x-1 font-medium">Connect GitHub</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- success toast -->
    <div id="toast-success" class="flex fixed sm:right-10 right-2 bottom-5 z-50 items-center sm:px-4 sm:py-4 py-3 px-2 mb-4 w-full max-w-[280px] sm:max-w-xs text-gray-200 rounded bg-[#0d1117]  border border-gray-700 shadow  animate__animated animate__fadeInRight" role="alert" v-if="toast">
        <div class="inline-flex justify-center items-center w-6 h-6 bg-lime-500 rounded-full text-white">
            <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal text-gray-200">{{ toast }}</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5  text-white" data-dismiss-target="#toast-success" aria-label="Close" @click="toast = !toast">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
</div>
</template>

<script>
import SideBar from '../components/SideBar.vue';
import { usersStore } from '../stores/usersStore'
import { Octokit } from "@octokit/core";

export default {
    name: 'HomePage',
    components: {
        SideBar,
    },
    setup() {
        const store = usersStore()

        return {
            // you can return the whole store instance to use it in the template
            store,
        }
    },
    data() {
        return {
            connect: false,
            user: '',
            githubUser: '',
            error: '',
            toast: false,
            repo: {},
            refresh: false,
        }
    },
    mounted() {
        setTimeout(()=> {
            this.getUser();
            if(this.store.user.access_token != null || this.store.user.access_token != '' || this.user.access_token != undefined) {
                this.getGithubUser();
            }
        }, 500)
    },
    methods: {
        getUser(){
            this.user = this.store.user
            if(this.user.access_token == null || this.user.access_token == '' || this.user.access_token == undefined){
                this.connect = true
            }
        },
        // get github user
        getGithubUser(){
            this.githubUser = this.store.gitHubUser
        },
        // update username
        updateToken() {
            // console.log(this.store.user.id)
            let data = {
                id: this.store.user.id,
                token: this.user.token
            }
            axios.post('/api/update/token', data)
                .then((res) => {
                    this.toast = res.data.message
                    // window.location.reload();
                    this.store.getUser()
                    this.connect = false
                    setTimeout(()=> {
                        this.toast = false
                    }, 4000)
                }).catch((err) => {
                    this.error = err.response.data.errors
                    this.toast = 'Error on updating token.'
                    setTimeout(()=> {
                        this.toast = false
                    }, 4000)
                })
        },
        // create repo
        async CreateRepo(){
            const data = {
                name: this.repo.name,
            }
            if (this.repo.type == 'private') {
                data.private = true
            } else {
                data.private = false
            }
            const user = this.store.user

            const octokit = new Octokit({
                auth: user.access_token,
            })

            await octokit.request('POST /user/repos', {
                name: data.name,
                private: data.private,
            })
            .then((res) => {
                this.toast = 'Repository created successfully.'
                this.refresh = !this.refresh
                setTimeout(()=> {
                    this.toast = false
                }, 4000)
            }).catch((err) => {
                console.log(err)
                this.toast = 'Error on creating repository.'
                setTimeout(()=> {
                    this.toast = false
                }, 4000)
            })
        }
    },

}
</script>
