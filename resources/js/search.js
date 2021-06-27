import 'alpinejs'
import Axios from 'axios'

window.searchWidget = () => {
    return {
        sendingRequest: false,
        searchQuery: '',
        showSearchDropdown: true,
        results: [],

        async searchIt(query){
            if(query.length < 3) return

            this.showSearchDropdown = true;

            const url = new URL(location.href)
            url.pathname = `/api/v1/search`
            try {
                this.sendingRequest = true
                const response = await Axios.post(url, {searchQuery: this.searchQuery})
                this.results = response.data
            } catch (e) {
                console.log(e)
            }
            finally{
                this.sendingRequest = false
            }
        },
    }
}