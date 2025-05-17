<script setup></script>

<template>
    <footer class="bg-gray-800 text-white pt-12 pb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4 flex items-center">
                        <TruckIcon class="w-6 h-6 mr-2" />
                        Rimberio
                    </h3>
                    <p class="text-gray-400">
                        Premium car rental services with a commitment to
                        excellence and customer satisfaction.
                    </p>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li>
                            <a
                                href="#"
                                class="text-gray-400 hover:text-white transition-all"
                                >Home</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="text-gray-400 hover:text-white transition-all"
                                >Vehicles</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="text-gray-400 hover:text-white transition-all"
                                >Services</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="text-gray-400 hover:text-white transition-all"
                                >About Us</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="text-gray-400 hover:text-white transition-all"
                                >Contact</a
                            >
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <MapPinIcon class="w-5 h-5 mr-2" />
                            1234 Drive Street, City, Country
                        </li>
                        <li class="flex items-center">
                            <PhoneIcon class="w-5 h-5 mr-2" />
                            +1 (555) 123-4567
                        </li>
                        <li class="flex items-center">
                            <EnvelopeIcon class="w-5 h-5 mr-2" />
                            info@rimberio.com
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                    <p class="text-gray-400 mb-4">
                        Subscribe to our newsletter for special offers and
                        updates.
                    </p>
                    <div class="flex">
                        <input
                            type="email"
                            placeholder="Your email"
                            class="px-4 py-2 w-full rounded-l-md focus:outline-none text-gray-800"
                        />
                        <button
                            class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-r-md transition-all"
                        >
                            <PaperAirplaneIcon class="w-5 h-5 text-white" />
                        </button>
                    </div>
                </div>
            </div>

            <div
                class="border-t border-gray-700 pt-6 flex flex-col md:flex-row justify-between items-center"
            >
                <p class="text-gray-400 mb-4 md:mb-0">
                    © 2023 Rimberio. All rights reserved.
                </p>
                <div class="flex space-x-4">
                    <a
                        href="#"
                        class="text-gray-400 hover:text-white transition-all"
                    >
                        <GlobeAltIcon class="w-5 h-5" />
                    </a>
                    <a
                        href="#"
                        class="text-gray-400 hover:text-white transition-all"
                    >
                        <EnvelopeIcon class="w-5 h-5" />
                    </a>
                    <a
                        href="#"
                        class="text-gray-400 hover:text-white transition-all"
                    >
                        <PhoneIcon class="w-5 h-5" />
                    </a>
                    <a
                        href="#"
                        class="text-gray-400 hover:text-white transition-all"
                    >
                        <UserPlusIcon class="w-5 h-5" />
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>

<style scoped></style>
