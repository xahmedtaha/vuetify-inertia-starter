import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import { ar, en } from 'vuetify/locale'

const vuetify = createVuetify({
    locale: {
        locale: 'en',
        fallback: 'en',
        messages: { en, ar },
    },
})

export default vuetify
