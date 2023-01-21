<template>
    <div>
        <Head title="Fb Push Notifications"/>

        <Heading class="mb-6">Fb Push Notifications</Heading>

        <Card
            class="flex flex-col p-4"
            style="min-height: 300px"
        >
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Notification Title</label>
                <div class="mt-1">
                    <input type="text" name="email" id="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="you@example.com" v-model="form.title">
                </div>
            </div>

            <div>
                <label for="fb-body" class="block text-sm font-medium text-gray-700">Notification Body</label>
                <div class="mt-1">
                    <textarea type="text" id="fb-body" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="you@example.com" v-model="form.body"></textarea>
                </div>
            </div>

            <div>
                <label for="fb-body" class="block text-sm font-medium text-gray-700">Notification Image</label>
                <div class="mt-1">
                    <input type="file" @change="uploadFile('image')" />
                </div>
            </div>

            <div>
                <label for="fb-body" class="block text-sm font-medium text-gray-700">Notification Icon</label>
                <div class="mt-1">
                    <input type="file" @change="uploadFile('icon')" />
                </div>
            </div>

            <div>
                <label for="fb-body" class="block text-sm font-medium text-gray-700">Notification Click Action</label>
                <div class="mt-1">
                    <input type="text" v-model="form.clickAction">
                </div>
            </div>

            <div>
                <label for="fb-body" class="block text-sm font-medium text-gray-700">Notification Priority</label>
                <div class="mt-1">
                    <select v-model="form.priority">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
            </div>

            <!--

             flex-shrink-auto shadow rounded focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-800 inline-flex items-center font-bold px-4 h-9 text-sm flex-shrink-0
             -->
            <div class="py-4">
                <button size="lg" class="shadow rounded focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white p-3" @click="sendNotification()"><span class="hidden md:inline-block">Send Notification</span><span class="inline-block md:hidden">Notify</span></button>
            </div>

        </Card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                title: '',
                body: '',
                image: '',
                icon: '',
                clickAction: '',
                priority: 'low',
                additionalData: []
            }
        }
    },
    mounted() {
        //
    },
    methods:{
        sendNotification(){
            Nova.request().post('/nova-vendor/fb-push-notifications/send', this.form).then(response => {
                this.loading = false;
            })
        },
        uploadFile(type){

        }

    }
}
</script>

<style>
/* Scoped Styles */
</style>
