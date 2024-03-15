<template>
    <form action="" autocomplete="off" class="form-search-snappic">
      <div class="photography-services">
        <div>
          <input type="radio" id="studio" name="photography_services" value="studio" checked/>
          <label for="studio">Studio</label>
        </div>
        <div>
          <input type="radio" id="photographer" name="photography_services" value="photographer" />
          <label for="photographer">Nhiếp ảnh gia tự do</label>
        </div>
      </div>
      <div class="search-wrapper">
        <div class="search-container">
          <div class="province">
            <div class="search-group-icon">
              <i class="feather-map-pin"></i>
            </div>
            <div>
              <div class="search-field-title">Tỉnh thành</div>
              <input type="text" id="province-search" name="province"
                     :value="'Hà Nội'" readonly>
            </div>
          </div>
          <div class="location">
            <div class="search-group-icon">
              <i class="feather-map-pin"></i>
            </div>
            <div>
              <div class="search-field-title">Quận huyện</div>
              <input type="text" id="location-search" name="location" placeholder="Quận huyện" :value="selectedLocation ? selectedLocation.name : ''" @click="showDropdownLocation">
            </div>
            <Transition name="slide-down">
              <div class="dropdown-list slide-down-transition-container" v-if="isShowDropdownLocation">
                <div v-for="(location, index) in listLocation" :key="index"
                     @click="selectLocation(location)"
                     :class="[
                      selectedLocation && selectedLocation.id == location.id
                        ? 'selected'
                        : ''
                    ]"
                >{{location.name}}
                  <i v-if="selectedLocation && selectedLocation.id == location.id" class="fa-solid fa-check"></i>
                </div>
              </div>
            </Transition>
          </div>
        </div>
        <div class="search-container">
          <div class="service">
            <div class="search-group-icon">
              <i class="fa-solid fa-camera-retro"></i>
            </div>
            <div>
              <div class="search-field-title">Dịch vụ</div>
              <input type="text" id="service-search" name="service" placeholder="Chọn dịch vụ"
                     readonly
                     @click="showDropdownService"
                     :value="selectedService ? selectedService.name : 'Tất cả dịch vụ'"
              >
            </div>
            <Transition name="slide-down">
              <div class="dropdown-list slide-down-transition-container" v-if="isShowDropdownService">
                <div v-for="(service, index) in listService" :key="index"
                     @click="selectService(service)"
                     :class="[
                      selectedService && selectedService.id == service.id
                        ? 'selected'
                        : ''
                    ]"
                >{{service.name}}
                  <i v-if="selectedService && selectedService.id == service.id" class="fa-solid fa-check"></i>
                </div>
              </div>
            </Transition>
          </div>
          <div class="name">
            <div class="search-group-icon">
              <i class="fa-solid fa-user"></i>
            </div>
            <div>
              <div class="search-field-title">Từ khóa tìm kiếm</div>
              <input type="text" id="name-search" name="name" placeholder="Nhập từ khóa tìm kiếm">
            </div>
          </div>
        </div>
        <div class="search-button" ><button type="submit" class="btn btn-primary btn-view">Tìm kiếm</button></div>

      </div>
    </form>
</template>

<script>
export default {
  name: 'HeaderSearchBar',
  data () {
    return {
      isShowDropdownLocation: false,
      isShowDropdownService: false,
      selectedLocation: null,
      selectedService: null,
      listLocation: [
        {
          id: 0,
          name: '----------Chọn quận huyện----------'
        },
        {
          id: 1,
          name: 'Quận Hà Đông'
        },
        {
          id: 2,
          name: 'Quận Đống Đa'
        },
        {
          id: 3,
          name: 'Quận Ba Đình'
        },
        {
          id: 4,
          name: 'Quận Cầu Giấy'
        },
        {
          id: 5,
          name: 'Quận Hoàng Mai'
        },
        {
          id: 6,
          name: 'Quận Long Biên'
        },
        {
          id: 7,
          name: 'Quận Thanh Xuân'
        },
        {
          id: 8,
          name: 'Quận Bắc Từ Liêm'
        },
        {
          id: 9,
          name: 'Quận Nam Từ Liêm'
        },
        {
          id: 10,
          name: 'Quận Hai Bà Trưng'
        },
        {
          id: 11,
          name: 'Quận Hoàn Kiếm'
        },
        {
          id: 12,
          name: 'Quận Tây Hồ'
        },
      ],
      listService: [
        {
          id: 0,
          name: '----------Tất cả dịch vụ---------'
        },
        {
          id: 1,
          name: 'Ảnh kỷ yếu'
        },
        {
          id: 2,
          name: 'Ảnh cưới'
        },
        {
          id: 3,
          name: 'Ảnh chân dung'
        },
        {
          id: 4,
          name: 'Ảnh sự kiện'
        },
        {
          id: 5,
          name: 'Ảnh cho bé'
        },
        {
          id: 6,
          name: 'Ảnh sản phẩm '
        }
      ]
    }
  },
  mounted() {
    $(document).click((event) => {
      const inputLocation = document.getElementById('location-search')
      if (!inputLocation.contains(event.target)) {
        this.isShowDropdownLocation = false
      }

      const inputService = document.getElementById('service-search')
      if (!inputService.contains(event.target)) {
        this.isShowDropdownService = false
      }
    });
  },
  methods: {
    showDropdownLocation() {
      this.isShowDropdownLocation = !this.isShowDropdownLocation
    },
    selectLocation(location) {
      if (location.id === 0) {
        this.selectedLocation = null
        this.isShowDropdownLocation = false
        return
      }
      this.selectedLocation = location
      this.isShowDropdownLocation = false
    },
    showDropdownService() {
      this.isShowDropdownService = !this.isShowDropdownService
    },
    selectService(service) {
      if (service.id === 0) {
        this.selectedService = null
        this.isShowDropdownService = false
        return
      }
      this.selectedService = service
      this.isShowDropdownService = false
    },
  },
};
</script>

<style scoped>
form {
  display: flex;
  justify-content: flex-start;
  flex-direction: column;
  padding: 10px;
  margin-top: 30px;
  width: 100%;
  height: 300px;
  z-index: 999;
}
.photography-services {
  display: flex;
  justify-content: flex-start;
  width: 100%;
  gap: 30px;
}
.photography-services div input {
  margin-right: 10px;
  transform: scale(1.5);
}
.photography-services div label {
  font-weight: 500;
}
.search-wrapper {
  margin-top: 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 10px;
  border-radius: 15px;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}
.search-container {
  display: flex;
  justify-content: space-between;
  flex-direction: row;
}
input, input:focus, input:hover, input:active {
  border: none;
  outline: none;
  background: transparent;
}
.search-wrapper .province, .search-wrapper .location, .search-wrapper .name, .search-wrapper .service{
  padding: 15px;
  display: flex;
  position: relative;
  align-items: center;
}
.search-wrapper .service i.fa-caret-down {
  position: absolute;
  right: 15px;
}
.search-wrapper .province input, .search-wrapper .location input, .search-wrapper .name input, .search-wrapper .service input{
 width: 100%;
  cursor: pointer;
}
#name-search {
  width: 100%;
}
.dropdown-list {
  position: absolute;
  top: 90%;
  width: 90%;
  box-shadow: 0px 4px 10px 0 rgba(0, 0, 0, 0.2);
  border-radius: 5px;
  overflow: auto;
  max-height: 300px;
  z-index: 99999;
  background: #fff;
}
.dropdown-list div {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  padding: 10px 10px 10px 15px;
  cursor: pointer;
}
.dropdown-list .selected {
  background: rgba( 0, 112, 244, 0.15);
  margin: 4px;
  border-radius: 5px;
  display: flex;
  justify-content: space-between;
}
.dropdown-list .selected i {
  color: #535CF4;
}
.dropdown-list div:hover {
  background: #f0f1f3;
}
.slide-down-transition-container {
  transform-origin: top;
  transition:
      transform 0.2s ease-in-out,
      opacity 0.2s ease-in-out;
}
.slide-down-enter-from,
.slide-down-leave-to {
  transform: scaleY(0);
  opacity: 0;
}
.search-button {
  margin-top: 30px;
  width: 100%;
  display: flex;
  padding: 0 20px 10px 20px;
  align-items: center;
}
.search-button > button {
  width: 100%;
  display: flex;
  justify-content: center;
}
@media (max-width: 767px) {
  .search-container {
    flex-direction: column;
  }
}
.search-field-title {
  color: black;
  font-weight: 500;
  font-size: 16px;
}
input[type="text"] {
  color: black;
  opacity: 0.8;
  font-size: 14px;
}
</style>
