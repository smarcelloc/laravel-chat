<template>
  <app-layout title="Chat">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Chat</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex"
          style="height: 30rem">
          <!-- List Users -->
          <div
            class="w-3/12 bg-gray-200 bg-opacity-25 border-r border-gray-200 overflow-y-auto">
            <ul>
              <li
                v-for="user in users"
                :key="user.id"
                class="p-6 text-lg text-gray-700 font-semibold border-b border-gray-200 hover:cursor-pointer hover:bg-gray-200 hover:bg-opacity-50">
                <div class="flex items-center">
                  <span>{{ user.name }}</span>
                  <span
                    class="h-2 w-2 ml-2 rounded-full bg-blue-500"
                    aria-label="New Notifications"></span>
                </div>
              </li>
            </ul>
          </div>

          <!-- Message -->
          <div class="w-9/12 flex flex-col justify-between">
            <!-- Box Message -->
            <div
              class="w-full p-6 flex flex-col overflow-y-auto"
              ref="boxMessage">
              <div class="w-full mb-3">
                <p
                  class="inline-block p-2 rounded-md messageFromMe"
                  style="max-width: 75%">
                  Message
                </p>
                <span class="block mt-1 text-xs text-gray-500">
                  22/11/2022 10:13
                </span>
              </div>
            </div>

            <!-- Input -->
            <div
              v-if="userActive"
              class="w-full bg-gray-200 bg-opacity-25 p-6 border-t border-gray-200">
              <form>
                <div class="flex rounded-md overflow-hidden border-gray-200">
                  <input
                    type="text"
                    name="message"
                    id="message"
                    class="flex-1 px-4 py-2 rounded-tl-md rounded-bl-md text-sm focus:outline-none border-gray-300 focus:border-indigo-700" />
                  <button
                    type="submit"
                    class="bg-indigo-700 bg-opacity-80 hover:bg-opacity-100 text-white px-4 py-2">
                    Send
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';

export default defineComponent({
  components: {
    AppLayout,
  },
  data() {
    return {
      users: {},
    };
  },
  mounted() {
    axios.get('api/users').then((response) => {
      this.users = response.data.users;
    });
  },
});
</script>
