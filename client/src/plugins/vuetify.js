// Styles
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'

// Vuetify
import { createVuetify } from 'vuetify'

export default createVuetify(
  // https://vuetifyjs.com/en/introduction/why-vuetify/#feature-guides
  {
    theme: {
      themes: {
        light: {
          dark: false,
          colors: {
            error: '#e63946',
            primary: '#457b9d', // #E53935
            secondary: '#a8dadc', // #FFCDD2
            background: '#f1faee',
            info: '#ff66b0',
          }
        },
      },
    }
  }
)
