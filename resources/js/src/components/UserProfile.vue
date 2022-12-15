<template>
    <div class="relative px-6">
        <div class="loading mt-24" v-if="profileLoading && !loggedInUser.login"></div>
        <div class="profile" v-else>
            <div class="profile-image relative lg:-mt-8 mt-8" v-if="loggedInUser.avatar_url">
                <img :src="loggedInUser.avatar_url" :alt="loggedInUser.login" class="rounded-full max-w-[90%] mx-auto">
                <div class="absolute bg-dark-primary right-3 bottom-7 z-30 px-1 py-1.5 border border-gray-700  rounded-full cursor-pointer" @click="statusPopup = true">
                    <button class="group py-1 px-2 text-gray-500 text-[13px] rounded w-full flex items-center">
                        <svg class="fill-gray-500 group-hover:fill-blue-400" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zM5 8a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zM5.32 9.636a.75.75 0 011.038.175l.007.009c.103.118.22.222.35.31.264.178.683.37 1.285.37.602 0 1.02-.192 1.285-.371.13-.088.247-.192.35-.31l.007-.008a.75.75 0 111.222.87l-.614-.431c.614.43.614.431.613.431v.001l-.001.002-.002.003-.005.007-.014.019a1.984 1.984 0 01-.184.213c-.16.166-.338.316-.53.445-.63.418-1.37.638-2.127.629-.946 0-1.652-.308-2.126-.63a3.32 3.32 0 01-.715-.657l-.014-.02-.005-.006-.002-.003v-.002h-.001l.613-.432-.614.43a.75.75 0 01.183-1.044h.001z"></path>
                        </svg>
                        <span class="ml-2 group-hover:text-blue-400 hidden group-hover:block">Set Status</span>
                    </button>
                </div>
            </div>
            <div class="profile-details" v-if="!profileEdit">
                <h2 class="text-gray-300 text-2xl mt-5 font-semibold" v-if="loggedInUser.name">{{ loggedInUser.name }}</h2>
                <p class="text-gray-400 text-lg mb-1 font-light">{{ loggedInUser.login }}</p>
                <p class="bio text-gray-300 text-md mt-3 mb-1" v-if="loggedInUser.bio">{{ loggedInUser.bio }}</p>
                <button class="w-full px-2 py-1 mt-4 border border-gray-700 bg-white/5 text-gray-300 font-medium rounded text-[15px] flex justify-center items-center gap-2" @click="profileEdit = true">
                    Edit profile
                </button>
        
                <div class="flex items-center flex-wrap gap-2 mt-5" v-if="loggedInUser.followers > 0">
                    <div class="flex items-center text-gray-400 text-sm">
                        <svg text="muted" aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400 mt-1">
                            <path fill-rule="evenodd" d="M5.5 3.5a2 2 0 100 4 2 2 0 000-4zM2 5.5a3.5 3.5 0 115.898 2.549 5.507 5.507 0 013.034 4.084.75.75 0 11-1.482.235 4.001 4.001 0 00-7.9 0 .75.75 0 01-1.482-.236A5.507 5.507 0 013.102 8.05 3.49 3.49 0 012 5.5zM11 4a.75.75 0 100 1.5 1.5 1.5 0 01.666 2.844.75.75 0 00-.416.672v.352a.75.75 0 00.574.73c1.2.289 2.162 1.2 2.522 2.372a.75.75 0 101.434-.44 5.01 5.01 0 00-2.56-3.012A3 3 0 0011 4z"></path>
                        </svg>
                        <span class="ml-1"><span class="text-white">{{loggedInUser.followers}}</span> follower</span>
                        <span class="mx-1">.</span>
                        <span class=""><span class="text-white">{{loggedInUser.following}}</span> following</span>
                    </div>
                </div>

                <div class="flex items-center flex-wrap gap-2 mt-5" v-if="loggedInUser.company">
                    <div class="flex items-center text-gray-300 text-sm">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-500">
                            <path fill-rule="evenodd" d="M1.5 14.25c0 .138.112.25.25.25H4v-1.25a.75.75 0 01.75-.75h2.5a.75.75 0 01.75.75v1.25h2.25a.25.25 0 00.25-.25V1.75a.25.25 0 00-.25-.25h-8.5a.25.25 0 00-.25.25v12.5zM1.75 16A1.75 1.75 0 010 14.25V1.75C0 .784.784 0 1.75 0h8.5C11.216 0 12 .784 12 1.75v12.5c0 .085-.006.168-.018.25h2.268a.25.25 0 00.25-.25V8.285a.25.25 0 00-.111-.208l-1.055-.703a.75.75 0 11.832-1.248l1.055.703c.487.325.779.871.779 1.456v5.965A1.75 1.75 0 0114.25 16h-3.5a.75.75 0 01-.197-.026c-.099.017-.2.026-.303.026h-3a.75.75 0 01-.75-.75V14h-1v1.25a.75.75 0 01-.75.75h-3zM3 3.75A.75.75 0 013.75 3h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 3.75zM3.75 6a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM3 9.75A.75.75 0 013.75 9h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 9.75zM7.75 9a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM7 6.75A.75.75 0 017.75 6h.5a.75.75 0 010 1.5h-.5A.75.75 0 017 6.75zM7.75 3a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5z"></path>
                        </svg>
                        <span class="ml-2">{{loggedInUser.company}}</span>
                    </div>
                </div>
        
                <div class="flex items-center flex-wrap gap-2 mt-2" v-if="loggedInUser.location">
                    <div class="flex items-center text-gray-300 text-sm">
                        <svg class="fill-gray-400" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                            <path fill-rule="evenodd" d="M11.536 3.464a5 5 0 010 7.072L8 14.07l-3.536-3.535a5 5 0 117.072-7.072v.001zm1.06 8.132a6.5 6.5 0 10-9.192 0l3.535 3.536a1.5 1.5 0 002.122 0l3.535-3.536zM8 9a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                        <span class="ml-2">{{loggedInUser.location}}</span>
                    </div>
                </div>

                <div class="flex items-center flex-wrap gap-2 mt-2" v-if="loggedInUser.blog">
                    <div class="flex items-center text-gray-300 text-sm">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-500">
                            <path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path>
                        </svg>
                        <span class="ml-2">{{loggedInUser.blog}}</span>
                    </div>
                </div>

                <div class="flex items-center flex-wrap gap-2 mt-2" v-if="loggedInUser.twitter_username">
                    <div class="flex items-center text-gray-300 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 273.5 222.3" height="16" width="16" class="fill-gray-500 text-gray-500"><title>Twitter</title>
                            <path d="M273.5 26.3a109.77 109.77 0 0 1-32.2 8.8 56.07 56.07 0 0 0 24.7-31 113.39 113.39 0 0 1-35.7 13.6 56.1 56.1 0 0 0-97 38.4 54 54 0 0 0 1.5 12.8A159.68 159.68 0 0 1 19.1 10.3a56.12 56.12 0 0 0 17.4 74.9 56.06 56.06 0 0 1-25.4-7v.7a56.11 56.11 0 0 0 45 55 55.65 55.65 0 0 1-14.8 2 62.39 62.39 0 0 1-10.6-1 56.24 56.24 0 0 0 52.4 39 112.87 112.87 0 0 1-69.7 24 119 119 0 0 1-13.4-.8 158.83 158.83 0 0 0 86 25.2c103.2 0 159.6-85.5 159.6-159.6 0-2.4-.1-4.9-.2-7.3a114.25 114.25 0 0 0 28.1-29.1" fill="currentColor"></path>
                        </svg>
                        <span class="ml-2">@{{loggedInUser.twitter_username}}</span>
                    </div>
                </div>
            </div>
            <div class="edit-profile" v-else>
                <form @submit.prevent="updateUserDetails">
                    <div class="form-group mb-2">
                        <label class="block mb-1.5 font-medium text-gray-100 text-sm">Name</label>
                        <input type="text" placeholder="Name" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="loggedInUser.name">
                    </div>
                    <div class="form-group mb-1">
                        <label class="block mb-1.5 font-medium text-gray-100 text-sm">Bio</label>
                        <textarea type="text" placeholder="Add a bio" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" rows="3" v-model="loggedInUser.bio"></textarea>
                    </div>
                    <p class="text-gray-500 text-xs mb-1.5">You can @mention other users and organizations to link to them.</p>
                    <div class="form-group mb-1.5 flex items-center gap-2">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-500">
                            <path fill-rule="evenodd" d="M1.5 14.25c0 .138.112.25.25.25H4v-1.25a.75.75 0 01.75-.75h2.5a.75.75 0 01.75.75v1.25h2.25a.25.25 0 00.25-.25V1.75a.25.25 0 00-.25-.25h-8.5a.25.25 0 00-.25.25v12.5zM1.75 16A1.75 1.75 0 010 14.25V1.75C0 .784.784 0 1.75 0h8.5C11.216 0 12 .784 12 1.75v12.5c0 .085-.006.168-.018.25h2.268a.25.25 0 00.25-.25V8.285a.25.25 0 00-.111-.208l-1.055-.703a.75.75 0 11.832-1.248l1.055.703c.487.325.779.871.779 1.456v5.965A1.75 1.75 0 0114.25 16h-3.5a.75.75 0 01-.197-.026c-.099.017-.2.026-.303.026h-3a.75.75 0 01-.75-.75V14h-1v1.25a.75.75 0 01-.75.75h-3zM3 3.75A.75.75 0 013.75 3h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 3.75zM3.75 6a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM3 9.75A.75.75 0 013.75 9h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 9.75zM7.75 9a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM7 6.75A.75.75 0 017.75 6h.5a.75.75 0 010 1.5h-.5A.75.75 0 017 6.75zM7.75 3a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5z"></path>
                        </svg>
                        <input type="text" placeholder="Company" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="loggedInUser.company">
                    </div>
                    <div class="form-group mb-1.5 flex items-center gap-2">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-500">
                            <path fill-rule="evenodd" d="M11.536 3.464a5 5 0 010 7.072L8 14.07l-3.536-3.535a5 5 0 117.072-7.072v.001zm1.06 8.132a6.5 6.5 0 10-9.192 0l3.535 3.536a1.5 1.5 0 002.122 0l3.535-3.536zM8 9a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                        <input type="text" placeholder="Location" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="loggedInUser.location">
                    </div>
                    <!-- <div class="form-group mb-1.5 flex items-start gap-2">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-500 mt-1">
                            <path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zm.5 4.75a.75.75 0 00-1.5 0v3.5a.75.75 0 00.471.696l2.5 1a.75.75 0 00.557-1.392L8.5 7.742V4.75z"></path>
                        </svg>
                        <div class="w-full">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" value="1" class="border border-gray-700 focus:border-blue-400 focus:outline-none focus:ring-0 px-3 py-1 text-sm rounded bg-dark-main text-gray-300">
                                <span class="text-gray-500 font-medium">Display current local time</span>
                            </label>
                            <select class="border border-gray-700 focus:border-blue-400 focus:outline-none focus:ring-0 py-1 mt-1 text-xs rounded bg-dark-main text-gray-300 w-full" aria-label="Time zone" name="user[profile_local_time_zone_name]" id="user_profile_local_time_zone_name">
                                <option value="International Date Line West">(GMT-12:00) International Date Line West</option>
                                <option value="American Samoa">(GMT-11:00) American Samoa</option>
                                <option value="Midway Island">(GMT-11:00) Midway Island</option>
                                <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                <option value="Alaska">(GMT-09:00) Alaska</option>
                                <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                <option value="Tijuana">(GMT-08:00) Tijuana</option>
                                <option value="Arizona">(GMT-07:00) Arizona</option>
                                <option value="Mazatlan">(GMT-07:00) Mazatlan</option>
                                <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                <option value="Central America">(GMT-06:00) Central America</option>
                                <option value="Central Time (US &amp; Canada)">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                <option value="Chihuahua">(GMT-06:00) Chihuahua</option>
                                <option value="Guadalajara">(GMT-06:00) Guadalajara</option>
                                <option value="Mexico City">(GMT-06:00) Mexico City</option>
                                <option value="Monterrey">(GMT-06:00) Monterrey</option>
                                <option value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
                                <option value="Bogota">(GMT-05:00) Bogota</option>
                                <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                <option value="Lima">(GMT-05:00) Lima</option>
                                <option value="Quito">(GMT-05:00) Quito</option>
                                <option value="Atlantic Time (Canada)">(GMT-04:00) Atlantic Time (Canada)</option>
                                <option value="Caracas">(GMT-04:00) Caracas</option>
                                <option value="Georgetown">(GMT-04:00) Georgetown</option>
                                <option value="La Paz">(GMT-04:00) La Paz</option>
                                <option value="Puerto Rico">(GMT-04:00) Puerto Rico</option>
                                <option value="Santiago">(GMT-04:00) Santiago</option>
                                <option value="Newfoundland">(GMT-03:30) Newfoundland</option>
                                <option value="Brasilia">(GMT-03:00) Brasilia</option>
                                <option value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
                                <option value="Greenland">(GMT-03:00) Greenland</option>
                                <option value="Montevideo">(GMT-03:00) Montevideo</option>
                                <option value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
                                <option value="Azores">(GMT-01:00) Azores</option>
                                <option value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
                                <option value="Edinburgh">(GMT+00:00) Edinburgh</option>
                                <option value="Lisbon">(GMT+00:00) Lisbon</option>
                                <option value="London">(GMT+00:00) London</option>
                                <option value="Monrovia">(GMT+00:00) Monrovia</option>
                                <option value="UTC">(GMT+00:00) UTC</option>
                                <option value="Amsterdam">(GMT+01:00) Amsterdam</option>
                                <option value="Belgrade">(GMT+01:00) Belgrade</option>
                                <option value="Berlin">(GMT+01:00) Berlin</option>
                                <option value="Bern">(GMT+01:00) Bern</option>
                                <option value="Bratislava">(GMT+01:00) Bratislava</option>
                                <option value="Brussels">(GMT+01:00) Brussels</option>
                                <option value="Budapest">(GMT+01:00) Budapest</option>
                                <option value="Casablanca">(GMT+01:00) Casablanca</option>
                                <option value="Copenhagen">(GMT+01:00) Copenhagen</option>
                                <option value="Dublin">(GMT+01:00) Dublin</option>
                                <option value="Ljubljana">(GMT+01:00) Ljubljana</option>
                                <option value="Madrid">(GMT+01:00) Madrid</option>
                                <option value="Paris">(GMT+01:00) Paris</option>
                                <option value="Prague">(GMT+01:00) Prague</option>
                                <option value="Rome">(GMT+01:00) Rome</option>
                                <option value="Sarajevo">(GMT+01:00) Sarajevo</option>
                                <option value="Skopje">(GMT+01:00) Skopje</option>
                                <option value="Stockholm">(GMT+01:00) Stockholm</option>
                                <option value="Vienna">(GMT+01:00) Vienna</option>
                                <option value="Warsaw">(GMT+01:00) Warsaw</option>
                                <option value="West Central Africa">(GMT+01:00) West Central Africa</option>
                                <option value="Zagreb">(GMT+01:00) Zagreb</option>
                                <option value="Zurich">(GMT+01:00) Zurich</option>
                                <option value="Athens">(GMT+02:00) Athens</option>
                                <option value="Bucharest">(GMT+02:00) Bucharest</option>
                                <option value="Cairo">(GMT+02:00) Cairo</option>
                                <option value="Harare">(GMT+02:00) Harare</option>
                                <option value="Helsinki">(GMT+02:00) Helsinki</option>
                                <option value="Jerusalem">(GMT+02:00) Jerusalem</option>
                                <option value="Kaliningrad">(GMT+02:00) Kaliningrad</option>
                                <option value="Kyiv">(GMT+02:00) Kyiv</option>
                                <option value="Pretoria">(GMT+02:00) Pretoria</option>
                                <option value="Riga">(GMT+02:00) Riga</option>
                                <option value="Sofia">(GMT+02:00) Sofia</option>
                                <option value="Tallinn">(GMT+02:00) Tallinn</option>
                                <option value="Vilnius">(GMT+02:00) Vilnius</option>
                                <option value="Baghdad">(GMT+03:00) Baghdad</option>
                                <option value="Istanbul">(GMT+03:00) Istanbul</option>
                                <option value="Kuwait">(GMT+03:00) Kuwait</option>
                                <option value="Minsk">(GMT+03:00) Minsk</option>
                                <option value="Moscow">(GMT+03:00) Moscow</option>
                                <option value="Nairobi">(GMT+03:00) Nairobi</option>
                                <option value="Riyadh">(GMT+03:00) Riyadh</option>
                                <option value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
                                <option value="Volgograd">(GMT+03:00) Volgograd</option>
                                <option value="Tehran">(GMT+03:30) Tehran</option>
                                <option value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
                                <option value="Baku">(GMT+04:00) Baku</option>
                                <option value="Muscat">(GMT+04:00) Muscat</option>
                                <option value="Samara">(GMT+04:00) Samara</option>
                                <option value="Tbilisi">(GMT+04:00) Tbilisi</option>
                                <option value="Yerevan">(GMT+04:00) Yerevan</option>
                                <option value="Kabul">(GMT+04:30) Kabul</option>
                                <option value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                <option value="Islamabad">(GMT+05:00) Islamabad</option>
                                <option value="Karachi">(GMT+05:00) Karachi</option>
                                <option value="Tashkent">(GMT+05:00) Tashkent</option>
                                <option value="Chennai">(GMT+05:30) Chennai</option>
                                <option value="Kolkata">(GMT+05:30) Kolkata</option>
                                <option value="Mumbai">(GMT+05:30) Mumbai</option>
                                <option value="New Delhi">(GMT+05:30) New Delhi</option>
                                <option value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
                                <option value="Kathmandu">(GMT+05:45) Kathmandu</option>
                                <option value="Almaty">(GMT+06:00) Almaty</option>
                                <option value="Astana">(GMT+06:00) Astana</option>
                                <option value="Dhaka">(GMT+06:00) Dhaka</option>
                                <option value="Urumqi">(GMT+06:00) Urumqi</option>
                                <option value="Rangoon">(GMT+06:30) Rangoon</option>
                                <option value="Bangkok">(GMT+07:00) Bangkok</option>
                                <option value="Hanoi">(GMT+07:00) Hanoi</option>
                                <option value="Jakarta">(GMT+07:00) Jakarta</option>
                                <option value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                <option value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
                                <option value="Beijing">(GMT+08:00) Beijing</option>
                                <option value="Chongqing">(GMT+08:00) Chongqing</option>
                                <option value="Hong Kong">(GMT+08:00) Hong Kong</option>
                                <option value="Irkutsk">(GMT+08:00) Irkutsk</option>
                                <option value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
                                <option value="Perth">(GMT+08:00) Perth</option>
                                <option value="Singapore">(GMT+08:00) Singapore</option>
                                <option value="Taipei">(GMT+08:00) Taipei</option>
                                <option value="Ulaanbaatar">(GMT+08:00) Ulaanbaatar</option>
                                <option value="Osaka">(GMT+09:00) Osaka</option>
                                <option value="Sapporo">(GMT+09:00) Sapporo</option>
                                <option value="Seoul">(GMT+09:00) Seoul</option>
                                <option value="Tokyo">(GMT+09:00) Tokyo</option>
                                <option value="Yakutsk">(GMT+09:00) Yakutsk</option>
                                <option value="Adelaide">(GMT+09:30) Adelaide</option>
                                <option value="Darwin">(GMT+09:30) Darwin</option>
                                <option value="Brisbane">(GMT+10:00) Brisbane</option>
                                <option value="Canberra">(GMT+10:00) Canberra</option>
                                <option value="Guam">(GMT+10:00) Guam</option>
                                <option value="Hobart">(GMT+10:00) Hobart</option>
                                <option value="Melbourne">(GMT+10:00) Melbourne</option>
                                <option value="Port Moresby">(GMT+10:00) Port Moresby</option>
                                <option value="Sydney">(GMT+10:00) Sydney</option>
                                <option value="Vladivostok">(GMT+10:00) Vladivostok</option>
                                <option value="Magadan">(GMT+11:00) Magadan</option>
                                <option value="New Caledonia">(GMT+11:00) New Caledonia</option>
                                <option value="Solomon Is.">(GMT+11:00) Solomon Is.</option>
                                <option value="Srednekolymsk">(GMT+11:00) Srednekolymsk</option>
                                <option value="Auckland">(GMT+12:00) Auckland</option>
                                <option value="Fiji">(GMT+12:00) Fiji</option>
                                <option value="Kamchatka">(GMT+12:00) Kamchatka</option>
                                <option value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
                                <option value="Wellington">(GMT+12:00) Wellington</option>
                                <option value="Chatham Is.">(GMT+12:45) Chatham Is.</option>
                                <option value="Nuku'alofa">(GMT+13:00) Nuku'alofa</option>
                                <option value="Samoa">(GMT+13:00) Samoa</option>
                                <option value="Tokelau Is.">(GMT+13:00) Tokelau Is.</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group mb-1.5 flex items-center gap-2">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-500">
                            <path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path>
                        </svg>
                        <input type="text" placeholder="Website" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="loggedInUser.blog">
                    </div>
                    <div class="form-group mb-3 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 273.5 222.3" height="16" width="16" class="fill-gray-500 text-gray-500"><title>Twitter</title>
                            <path d="M273.5 26.3a109.77 109.77 0 0 1-32.2 8.8 56.07 56.07 0 0 0 24.7-31 113.39 113.39 0 0 1-35.7 13.6 56.1 56.1 0 0 0-97 38.4 54 54 0 0 0 1.5 12.8A159.68 159.68 0 0 1 19.1 10.3a56.12 56.12 0 0 0 17.4 74.9 56.06 56.06 0 0 1-25.4-7v.7a56.11 56.11 0 0 0 45 55 55.65 55.65 0 0 1-14.8 2 62.39 62.39 0 0 1-10.6-1 56.24 56.24 0 0 0 52.4 39 112.87 112.87 0 0 1-69.7 24 119 119 0 0 1-13.4-.8 158.83 158.83 0 0 0 86 25.2c103.2 0 159.6-85.5 159.6-159.6 0-2.4-.1-4.9-.2-7.3a114.25 114.25 0 0 0 28.1-29.1" fill="currentColor"></path>
                        </svg>
                        <input type="text" placeholder="Twitter username" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="loggedInUser.twitter_username">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="bg-green-primary px-3 py-1.5 text-white font-semibold rounded text-xs">Save</button>
                        <button type="button" class="px-2 py-1 border border-gray-700 bg-white/5 text-gray-300 font-medium rounded-md text-[12px] ml-2" @click="profileEdit = false">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- status popup -->
        <div class="status-popup fixed top-0 left-0 z-40 bg-black/70 w-full h-full flex justify-center items-center" v-if="statusPopup">
            <div class="popup-main max-w-[400px] min-w-[400px] rounded border border-gray-700 bg-[#0d1117]">
                <div class="popup-head px-5 flex justify-between items-center py-4 bg-white/5">
                    <h2 class="text-gray-300 text-sm font-medium">Edit Status</h2>
                    <button @click="statusPopup = false">
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

         <!-- success toast -->
        <div id="toast-success" class="flex fixed sm:right-10 right-2 bottom-5 z-50 items-center sm:px-4 sm:py-4 py-3 px-2 mb-4 w-full max-w-[280px] sm:max-w-xs text-gray-200 rounded bg-[#0d1117]  border border-gray-700 shadow  animate__animated animate__fadeInRight" role="alert" v-if="toast && errorType == 'success'">
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
    import { usersStore } from '../stores/usersStore'
    import { Octokit } from "@octokit/core";
    export default {
        name: 'Profile',
        data() {
            return {
                loggedInUser: {},
                profileLoading: true,
                profileEdit: false,
                errorType: '',
                toast: false,
                statusPopup: false,
                clearTimeMenu: false,
                statusExpire: 'Never',
            }
        },
        setup() {
            const store = usersStore()

            return {
                // you can return the whole store instance to use it in the template
                store,
            }
        },
        mounted() {
            setTimeout(() => {
                this.getloggedInUser();
            }, 600)
        },
        methods: {
            // getloggedInUser
            getloggedInUser() {
                this.loggedInUser = this.store.gitHubUser
                this.profileLoading = false
            },
            // update profile
            async updateUserDetails(){
                const octokit = new Octokit({
                    auth: this.store.user.access_token
                })

                await octokit.request('PATCH /user', {
                    name: this.loggedInUser.name,
                    bio: this.loggedInUser.bio,
                    company: this.loggedInUser.company,
                    location: this.loggedInUser.location,
                    blog: this.loggedInUser.blog,
                    twitter_username: this.loggedInUser.twitter_username,
                })
                .then((res) => {
                    this.errorType = 'success'
                    this.toast = 'User details updated successfully.'
                    this.loggedInUser = res.data
                    this.profileEdit = false
                    setTimeout(()=> {
                        this.toast = false
                    }, 4000)
                }).catch((err) => {
                    console.log(err)
                    this.errorType = 'error'
                    this.toast = 'Error on updating successfully.'
                    setTimeout(()=> {
                        this.toast = false
                    }, 4000)
                })
            },

            // setStatus
            setStatusExpire(value){
                this.statusExpire = value
                this.clearTimeMenu = false
            }

        }
    }
</script>
