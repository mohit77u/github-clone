<template>
    <div>
        <div class="repo-details py-5 px-8">
            <div class="top flex flex-wrap items-center justify-between">
                <div class="left w-full md:w-auto flex items-center">
                    <span>
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400 mr-2">
                            <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                        </svg>
                    </span>
                    <span class="text-xl">
                        <router-link :to="{name: 'Profile', params: { username: $route.params.username }}" class="text-blue-500 hover:underline underline-offset-2">{{ $route.params.username }}</router-link>
                        <span class="mx-1 text-gray-400">/</span>
                        <a href="#" class="text-blue-500 hover:underline underline-offset-2">{{$route.params.repository}}</a>
                    </span>
                    <span class="border border-gray-700 rounded-full text-gray-400 ml-2 px-2 text-[11px] py-0.5">{{repo.private ? 'Private' : 'Public'}}</span>
                </div>
                <div class="right w-full md:w-auto mt-4 md:mt-0 flex flex-wrap md:gap-4 gap-2">
                    <div class="w-full md:w-auto flex items-center md:gap-4 gap-2 order-1 md:order-0">
                        <button class="w-full mdLw-auto lg:px-4 px-2 lg:py-1.5 py-1 text-gray-400 border border-gray-700 rounded-md text-[12px] hover:border-gray-400 bg-white/5 flex justify-center items-center gap-2">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path fill-rule="evenodd" d="M4.456.734a1.75 1.75 0 012.826.504l.613 1.327a3.081 3.081 0 002.084 1.707l2.454.584c1.332.317 1.8 1.972.832 2.94L11.06 10l3.72 3.72a.75.75 0 11-1.061 1.06L10 11.06l-2.204 2.205c-.968.968-2.623.5-2.94-.832l-.584-2.454a3.081 3.081 0 00-1.707-2.084l-1.327-.613a1.75 1.75 0 01-.504-2.826L4.456.734zM5.92 1.866a.25.25 0 00-.404-.072L1.794 5.516a.25.25 0 00.072.404l1.328.613A4.582 4.582 0 015.73 9.63l.584 2.454a.25.25 0 00.42.12l5.47-5.47a.25.25 0 00-.12-.42L9.63 5.73a4.581 4.581 0 01-3.098-2.537L5.92 1.866z"></path>
                            </svg>
                           <span class="font-semibold">Pin</span>
                        </button>
                        <button class="w-full mdLw-auto lg:px-4 px-2 lg:py-1.5 py-1 text-gray-400 border border-gray-700 rounded-md text-[12px] hover:border-gray-400 bg-white/5 flex justify-center items-center gap-2">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path fill-rule="evenodd" d="M1.679 7.932c.412-.621 1.242-1.75 2.366-2.717C5.175 4.242 6.527 3.5 8 3.5c1.473 0 2.824.742 3.955 1.715 1.124.967 1.954 2.096 2.366 2.717a.119.119 0 010 .136c-.412.621-1.242 1.75-2.366 2.717C10.825 11.758 9.473 12.5 8 12.5c-1.473 0-2.824-.742-3.955-1.715C2.92 9.818 2.09 8.69 1.679 8.068a.119.119 0 010-.136zM8 2c-1.981 0-3.67.992-4.933 2.078C1.797 5.169.88 6.423.43 7.1a1.619 1.619 0 000 1.798c.45.678 1.367 1.932 2.637 3.024C4.329 13.008 6.019 14 8 14c1.981 0 3.67-.992 4.933-2.078 1.27-1.091 2.187-2.345 2.637-3.023a1.619 1.619 0 000-1.798c-.45-.678-1.367-1.932-2.637-3.023C11.671 2.992 9.981 2 8 2zm0 8a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                            <span class="flex items-center font-semibold">Unwatch <span class="text-center text-gray-300 text-[12px] font-semibold mx-2">{{repo.watchers_count}}</span> <span class="dropdown-caret"></span></span>
                        </button>
                    </div>
                    <div class="w-full md:w-auto flex items-center md:gap-4 gap-2 order-0 md:order-1">
                        <button class="lg:px-4 px-2 lg:py-1.5 py-1 text-gray-400 border md:border-gray-700 border-transparent rounded-md text-[12px] md:hover:border-gray-400 md:bg-white/5 flex justify-center items-center gap-2 order-1 md:order-0" :disabled="repo.fork ? 'disabled' : ''">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path fill-rule="evenodd" d="M5 3.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm0 2.122a2.25 2.25 0 10-1.5 0v.878A2.25 2.25 0 005.75 8.5h1.5v2.128a2.251 2.251 0 101.5 0V8.5h1.5a2.25 2.25 0 002.25-2.25v-.878a2.25 2.25 0 10-1.5 0v.878a.75.75 0 01-.75.75h-4.5A.75.75 0 015 6.25v-.878zm3.75 7.378a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm3-8.75a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
                            </svg>
                            <span class="items-center flex font-semibold">Fork <span class="text-center text-gray-300 text-[12px] font-semibold mx-2">{{repo.forks_count}}</span> <span class="dropdown-caret hidden md:block"></span></span>
                        </button>
                        <button class="lg:px-4 px-2 lg:py-1.5 py-1 text-gray-400 border md:border-gray-700 border-transparent rounded-md text-[12px] md:hover:border-gray-400 md:bg-white/5 flex justify-center items-center gap-2 order-0 md:order-1">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" :class="repo.stargazers_count > 0 ? 'fill-yellow-300' : 'fill-gray-400'">
                                <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
                            </svg>
                            <span class="flex items-center font-semibold">Star <span class="text-center text-gray-300 text-[12px] font-semibold mx-2">{{repo.stargazers_count}}</span> <span class="dropdown-caret hidden md:block"></span></span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="repo-menus my-5 border-b border-gray-800 relative lg:inline-flex flex justify-between lg:justify-start items-center">
                <ul class="flex items-center gap-1" id="menu1">
                    <li class="pb-1 border-b-2 border-orange-500">
                        <a href="#" class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path fill-rule="evenodd" d="M4.72 3.22a.75.75 0 011.06 1.06L2.06 8l3.72 3.72a.75.75 0 11-1.06 1.06L.47 8.53a.75.75 0 010-1.06l4.25-4.25zm6.56 0a.75.75 0 10-1.06 1.06L13.94 8l-3.72 3.72a.75.75 0 101.06 1.06l4.25-4.25a.75.75 0 000-1.06l-4.25-4.25z"></path>
                            </svg>
                            <span class="menu-title">Code</span>
                        </a>
                    </li>
                    <li class="pb-1 border-b-2 border-transparent">
                        <a href="#" class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                            </svg>
                            <span class="menu-title">Issues</span>
                        </a>
                    </li>
                    <li class="pb-1 border-b-2 border-transparent">
                        <a href="#" class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path fill-rule="evenodd" d="M7.177 3.073L9.573.677A.25.25 0 0110 .854v4.792a.25.25 0 01-.427.177L7.177 3.427a.25.25 0 010-.354zM3.75 2.5a.75.75 0 100 1.5.75.75 0 000-1.5zm-2.25.75a2.25 2.25 0 113 2.122v5.256a2.251 2.251 0 11-1.5 0V5.372A2.25 2.25 0 011.5 3.25zM11 2.5h-1V4h1a1 1 0 011 1v5.628a2.251 2.251 0 101.5 0V5A2.5 2.5 0 0011 2.5zm1 10.25a.75.75 0 111.5 0 .75.75 0 01-1.5 0zM3.75 12a.75.75 0 100 1.5.75.75 0 000-1.5z"></path>
                            </svg>
                            <span class="menu-title">Pull Requests</span>
                        </a>
                    </li>
                    <li class="pb-1 border-b-2 border-transparent">
                        <a href="#" class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zM6.379 5.227A.25.25 0 006 5.442v5.117a.25.25 0 00.379.214l4.264-2.559a.25.25 0 000-.428L6.379 5.227z"></path>
                            </svg>
                            <span class="menu-title">Actions</span>
                        </a>
                    </li>
                    <li class="pb-1 border-b-2 border-transparent">
                        <a href="#" class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path fill-rule="evenodd" d="M0 1.75C0 .784.784 0 1.75 0h12.5C15.216 0 16 .784 16 1.75v12.5A1.75 1.75 0 0114.25 16H1.75A1.75 1.75 0 010 14.25V1.75zM1.5 6.5v7.75c0 .138.112.25.25.25H5v-8H1.5zM5 5H1.5V1.75a.25.25 0 01.25-.25H5V5zm1.5 1.5v8h7.75a.25.25 0 00.25-.25V6.5h-8zm8-1.5h-8V1.5h7.75a.25.25 0 01.25.25V5z"></path>
                            </svg>
                            <span class="menu-title">Projects</span>
                        </a>
                    </li>
                    <li class="pb-1 border-b-2 border-transparent">
                        <a href="#" class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path fill-rule="evenodd" d="M0 1.75A.75.75 0 01.75 1h4.253c1.227 0 2.317.59 3 1.501A3.744 3.744 0 0111.006 1h4.245a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75h-4.507a2.25 2.25 0 00-1.591.659l-.622.621a.75.75 0 01-1.06 0l-.622-.621A2.25 2.25 0 005.258 13H.75a.75.75 0 01-.75-.75V1.75zm8.755 3a2.25 2.25 0 012.25-2.25H14.5v9h-3.757c-.71 0-1.4.201-1.992.572l.004-7.322zm-1.504 7.324l.004-5.073-.002-2.253A2.25 2.25 0 005.003 2.5H1.5v9h3.757a3.75 3.75 0 011.994.574z"></path>
                            </svg>
                            <span class="menu-title">Wiki</span>
                        </a>
                    </li>
                    <li class="pb-1 border-b-2 border-transparent">
                        <a href="#" class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path fill-rule="evenodd" d="M7.467.133a1.75 1.75 0 011.066 0l5.25 1.68A1.75 1.75 0 0115 3.48V7c0 1.566-.32 3.182-1.303 4.682-.983 1.498-2.585 2.813-5.032 3.855a1.7 1.7 0 01-1.33 0c-2.447-1.042-4.049-2.357-5.032-3.855C1.32 10.182 1 8.566 1 7V3.48a1.75 1.75 0 011.217-1.667l5.25-1.68zm.61 1.429a.25.25 0 00-.153 0l-5.25 1.68a.25.25 0 00-.174.238V7c0 1.358.275 2.666 1.057 3.86.784 1.194 2.121 2.34 4.366 3.297a.2.2 0 00.154 0c2.245-.956 3.582-2.104 4.366-3.298C13.225 9.666 13.5 8.36 13.5 7V3.48a.25.25 0 00-.174-.237l-5.25-1.68zM9 10.5a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.75a.75.75 0 10-1.5 0v3a.75.75 0 001.5 0v-3z"></path>
                            </svg>
                            <span class="menu-title">Security</span>
                        </a>
                    </li>
                    <li class="pb-1 border-b-2 border-transparent">
                        <a href="#" class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path fill-rule="evenodd" d="M1.5 1.75a.75.75 0 00-1.5 0v12.5c0 .414.336.75.75.75h14.5a.75.75 0 000-1.5H1.5V1.75zm14.28 2.53a.75.75 0 00-1.06-1.06L10 7.94 7.53 5.47a.75.75 0 00-1.06 0L3.22 8.72a.75.75 0 001.06 1.06L7 7.06l2.47 2.47a.75.75 0 001.06 0l5.25-5.25z"></path>
                            </svg>
                            <span class="menu-title">Insights</span>
                        </a>
                    </li>
                    <li class="pb-1 border-b-2 border-transparent">
                        <a href="#" class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path fill-rule="evenodd" d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="menu-title">Settings</span>
                        </a>
                    </li> 
                </ul>
                <div class="block xl:hidden menu-icon-div">
                    <button class="ml-3" @click="mobileRepoMenu = !mobileRepoMenu">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                            <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </button>
                    <div :class="[mobileRepoMenu ? 'block' : 'hidden', 'menu absolute top-10 right-0 bg-dark-primary rounded z-20 py-1.5 px-2 shadow-lg']">
                        <ul id="menu2"></ul>
                    </div>
                </div>
            </div>

            <div class="empty-repo-details my-7 2xl:w-9/12 lg:w-10/12 md:w-10/12 w-full mx-auto">
                <!-- graidnet blue details -->
                <div class="repo-top-bar w-full p-4 rounded rounded-b-none border border-[rgba(56,139,253,0.4)] bg-gradient-to-b from-[rgba(56,139,253,0.15)] to-[rgba(56,139,253,0.15)]">
                    <h3 class="text-gray-400 text-md">Quick setup — if you’ve done this kind of thing before</h3>
                    <div class="url-bar flex  sm:flex-row flex-col gap-x-5 gap-y-1 justify-between my-2">
                        <div class="flex  items-center lg:gap-4 gap-2 md:w-5/12 lg:w-4/12 2xl:w-3/12 w-full">
                            <a href="https://desktop.github.com/" target="blank" class="px-2 py-1 border border-gray-700 bg-dark-primary/70 hover:border-gray-400 text-gray-300 font-medium rounded-md text-[12px] flex justify-center items-center gap-2">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                    <path d="M4.927 5.427l2.896 2.896a.25.25 0 00.354 0l2.896-2.896A.25.25 0 0010.896 5H8.75V.75a.75.75 0 10-1.5 0V5H5.104a.25.25 0 00-.177.427z"></path><path d="M1.573 2.573a.25.25 0 00-.073.177v7.5a.25.25 0 00.25.25h12.5a.25.25 0 00.25-.25v-7.5a.25.25 0 00-.25-.25h-3a.75.75 0 110-1.5h3A1.75 1.75 0 0116 2.75v7.5A1.75 1.75 0 0114.25 12h-3.727c.099 1.041.52 1.872 1.292 2.757A.75.75 0 0111.25 16h-6.5a.75.75 0 01-.565-1.243c.772-.885 1.192-1.716 1.292-2.757H1.75A1.75 1.75 0 010 10.25v-7.5A1.75 1.75 0 011.75 1h3a.75.75 0 010 1.5h-3a.25.25 0 00-.177.073zM6.982 12a5.72 5.72 0 01-.765 2.5h3.566a5.72 5.72 0 01-.765-2.5H6.982z"></path>
                                </svg>
                                <span class="whitespace-nowrap">Set up in desktop</span>
                            </a>
                            <p class="text-gray-300 text-md hidden sm:block">or</p>
                            <div class="flex border border-gray-700 bg-dark-primary text-gray-300 font-medium rounded-md text-[12px]">
                                <button :class="['text-gray-300 sm:px-2 px-1 py-1 text-[10.5px] sm:text-[13px]', ssh ? 'bg-white/5' : 'bg-transparent', 'border border-transparent hover:border-gray-400 rounded-md rounded-r-none' ]" @click="ssh = false">HTTPS</button>
                                <button :class="['text-gray-300 sm:px-2 px-1 py-1 text-[10.5px] sm:text-[13px]', ssh ? 'bg-transparent' : 'bg-white/5', 'border border-transparent hover:border-gray-400 rounded-md rounded-l-none' ]" @click="ssh = true">SSH</button>
                            </div>
                        </div>
                        <div class="right w-full mt-2 sm:mt-0">
                            <div class="border border-gray-700 bg-dark-primary/70 text-gray-300 flex font-medium rounded-md text-[12px]">
                                <input class="focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded-md bg-dark-main text-gray-300 w-[calc(100%-40px)] rounded-r-none" readonly :value="!ssh ? repo.clone_url : repo.ssh_url" />
                                <button class="text-gray-500 px-2 py-1 bg-white/5 w-10 text-center border border-transparent hover:border-gray-400 rounded-md rounded-l-none">
                                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400 mx-auto">
                                        <path fill-rule="evenodd" d="M0 6.75C0 5.784.784 5 1.75 5h1.5a.75.75 0 010 1.5h-1.5a.25.25 0 00-.25.25v7.5c0 .138.112.25.25.25h7.5a.25.25 0 00.25-.25v-1.5a.75.75 0 011.5 0v1.5A1.75 1.75 0 019.25 16h-7.5A1.75 1.75 0 010 14.25v-7.5z"></path><path fill-rule="evenodd" d="M5 1.75C5 .784 5.784 0 6.75 0h7.5C15.216 0 16 .784 16 1.75v7.5A1.75 1.75 0 0114.25 11h-7.5A1.75 1.75 0 015 9.25v-7.5zm1.75-.25a.25.25 0 00-.25.25v7.5c0 .138.112.25.25.25h7.5a.25.25 0 00.25-.25v-7.5a.25.25 0 00-.25-.25h-7.5z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <p class="text-[14px] text-gray-300">Get started by <a href="#" class="text-blue-400 hover:underline underline-offset-2"> creating a new file</a> or <a href="#" class="text-blue-400 hover:underline underline-offset-2"> uploading an existing file</a>. We recommend every repository include a <a href="#" class="text-blue-400 hover:underline underline-offset-2"> README</a>, <a href="#" class="text-blue-400 hover:underline underline-offset-2">LICENSE</a>, and <a href="#" class="text-blue-400 hover:underline underline-offset-2">.gitignore</a>.</p>
                </div>
                <!-- starting commands -->
                <div class="main border-b border-l border-r border-gray-700 p-4 py-6 rounded rounded-t-none rounded-b-none">
                    <h2 class="text-lg text-gray-300 font-semibold">…or create a new repository on the command line</h2>
                    <pre class="main-top bg-white/5 my-1 rounded text-gray-300 text-sm p-3 py-2 flex flex-col justify-start overflow-x-auto">
                       <span>echo "# test" >> README.md</span>
                       <span>git init</span>
                       <span>git add README.md</span>
                       <span>git commit -m "first commit"</span>
                       <span>git branch -M main</span>
                       <span>git remote add origin {{ !ssh ? repo.clone_url : repo.ssh_url }}</span>
                       <span>git push -u origin main</span>
                    </pre>
                </div>
                <!-- existing repo commands -->
                <div class="main border-b border-l border-r border-gray-700 p-4 py-6 rounded rounded-t-none rounded-b-none">
                    <h2 class="text-lg text-gray-300 font-semibold">…or push an existing repository from the command line</h2>
                    <pre class="main-top bg-white/5 my-1 rounded text-gray-300 text-sm p-3 py-2 flex flex-col justify-start overflow-x-auto">
                        <span>git remote add origin {{ !ssh ? repo.clone_url : repo.ssh_url }}</span>
                        <span>git branch -M main</span>
                        <span>git push -u origin main</span>
                    </pre>
                </div>
                <!-- import repo -->
                <div class="main border-b border-l border-r border-gray-700 p-4 py-6 rounded rounded-t-none">
                    <h2 class="text-lg text-gray-300 font-semibold">…or import code from another repository</h2>
                    <p class="text-gray-300 text-sm mb-3">You can initialize this repository with code from a Subversion, Mercurial, or TFS project.</p>
                    <button class="px-2 py-1 border border-gray-700 bg-white/5 text-gray-300 font-medium rounded-md text-[12px] flex justify-center items-center gap-2">
                        Import code
                    </button>
                </div>

                <div class="text-center text-gray-400 mt-5 text-sm flex justify-center items-center gap-2">
                    <span>
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-500">
                            <path fill-rule="evenodd" d="M8 1.5c-2.363 0-4 1.69-4 3.75 0 .984.424 1.625.984 2.304l.214.253c.223.264.47.556.673.848.284.411.537.896.621 1.49a.75.75 0 01-1.484.211c-.04-.282-.163-.547-.37-.847a8.695 8.695 0 00-.542-.68c-.084-.1-.173-.205-.268-.32C3.201 7.75 2.5 6.766 2.5 5.25 2.5 2.31 4.863 0 8 0s5.5 2.31 5.5 5.25c0 1.516-.701 2.5-1.328 3.259-.095.115-.184.22-.268.319-.207.245-.383.453-.541.681-.208.3-.33.565-.37.847a.75.75 0 01-1.485-.212c.084-.593.337-1.078.621-1.489.203-.292.45-.584.673-.848.075-.088.147-.173.213-.253.561-.679.985-1.32.985-2.304 0-2.06-1.637-3.75-4-3.75zM6 15.25a.75.75 0 01.75-.75h2.5a.75.75 0 010 1.5h-2.5a.75.75 0 01-.75-.75zM5.75 12a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5z"></path>
                        </svg>
                    </span>
                    <p class="-mt-1"><span class="text-white font-medium"> ProTip!</span> Use the URL for this page when adding GitHub as a remote.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Octokit } from "@octokit/core";
import { usersStore } from '../../stores/usersStore'
export default {
    name: 'Repository',
    data(){
        return{
            repo: '',
            repoTree: '',
            ssh: false,
            mobileRepoMenu: false,
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
        this.getRepoDetails();
        // this.getRepoTree();
    },
    methods: {
        // get repo details
        async getRepoDetails(){
            const octokit = new Octokit({
                auth: this.store.user.access_token
            })

            await octokit.request('GET /repos/{owner}/{repo}', {
                owner: this.$route.params.username,
                repo: this.$route.params.repository,
            })
            .then((res) => {
                this.repo = res.data
            }).catch((err) => {
                console.log(err)
            })
        },
        // get repo tree
        async getRepoTree(){
            const octokit = new Octokit({
                auth: this.store.user.access_token
            })

            await octokit.request('GET /repos/{owner}/{repo}/git/trees/{tree_sha}', {
                owner: this.$route.params.username,
                repo: this.$route.params.repository,
                tree_sha: this.$route.params.repository
            })
            .then((res) => {
                this.repoTree = res.data
            }).catch((err) => {
                console.log(err)
            })
        }
    }
}
</script>
