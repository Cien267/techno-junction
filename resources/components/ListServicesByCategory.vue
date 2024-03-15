<template>
  <section class="service-section">
  <div class="container">
    <div class="section-heading">
      <div class="row align-items-center">
        <div class="col-md-6 aos" data-aos="fade-up">
          <h2>Featured Services</h2>
          <p>Explore the greatest our services. You won’t be disappointed</p>
        </div>
        <div class="col-md-6 text-md-end aos" data-aos="fade-up">
          <div class="owl-nav mynav"></div>
        </div>
      </div>
    </div>
    <ul class="aos nav nav-pills mb-3 d-flex justify-content-center align-items-center" data-aos="fade-up" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation" v-for="(cat, index) in listServiceCategories" :key="index">
        <button class="nav-link photoshoot-type"
                :class="{ 'active': selectedTab.id === cat.id }"
                :id="'pills-' + cat.code + '-tab'"
                data-bs-toggle="pill"
                :data-bs-target="'#pills-' + cat.code"
                type="button"
                role="tab"
                :aria-controls="'pills-' + cat.code"
                :aria-selected="selectedTab.id === cat.id"
                @click="selectTab(cat)">
          {{cat.name}}
        </button>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade"
           :class="{'show active' : cat.id == selectedTab.id}"
           :id="'pills-' + cat.code"
           role="tabpanel"
           :aria-labelledby="'pills-' + cat.code + '-tab'"
           tabindex="0"
           v-for="(cat, index) in listServiceCategories" :key="index">
        <div class="row studio-field">
          <div class="col-md-4" style="padding-bottom: 40px"  v-for="(service, index2) in listTransformedServices[cat.id]" :key="index2">
            <a class="studio-widget aos"
               data-aos="fade-up"
               :style="{backgroundImage: 'url(' + service.background + ')'}"
               :data-fancybox="'gallery' + service.id"
               :href="service.gallery[0]"
            >
              <div class="d-flex justify-content-between mx-3 pt-3">
                <div class="text-dark service-name">
                  <div class="service-name">{{selectedTab.name}}</div>
                </div>
                <div class="">
                  <a href="javascript:void(0)" class="fav-icon">
                    <i class="fa-regular fa-heart text-dark"></i>
                  </a>
                </div>
              </div>
              <div class="studio-info-wrapper">
                <div class="px-3 d-flex justify-content-between">
                  <div style="width: 70%;">
                    <div class="text-white studio-name">{{service.name}}</div>
                    <div class="text-white studio-info d-flex justify-content-between align-items-center">
                      <span><i class="fa-solid fa-location-dot"></i> {{service.address}}</span>
                      <span><i class="fa-solid fa-star" style="color: yellow"></i> {{service.rating}}</span>
                      <span><i class="fa-solid fa-comment"></i> {{service.comments}}</span>
                    </div>
                  </div>
                  <div style="width: 30%;" class="d-flex justify-content-end align-items-center">
                    <div class="studio-avatar" :style="{backgroundImage: 'url(' + service.logo + ')'}"></div>
                  </div>
                </div>
                <div class="px-3 pb-3 d-flex justify-content-between align-items-center">
                  <div class="price-wrapper">
                    <div>{{formatMoney(service.price)}} đ</div>
                    <div>{{formatMoney(service.discountPrice)}} đ</div>
                  </div>
                  <div class="studio-see-more-info">Xem thêm
                  </div>
                </div>
              </div>
            </a>
            <div class="owl-carousel gallery-slider">
              <div class="gallery-widget" v-for="(image, index3) in service.gallery" :key="index3">
                <a :href="image" :data-fancybox="'gallery' + service.id">
                  <img class="img-fluid" alt="Image" :src="image">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>

</template>

<script>
import 'aos/dist/aos.css';
import AOS from 'aos';
import listServices from '../js/listServicesSample.json'
export default {
  name: 'ListServicesByCategory',
  data () {
    return {
      listServiceCategories: [
        {
          id: 1,
          code: 'wedding',
          name: 'Ảnh cưới',
        },
        {
          id: 2,
          code: 'graduation',
          name: 'Ảnh tốt nghiệp',
        },
        {
          id: 3,
          code: 'event',
          name: 'Ảnh sự kiện',
        },
        {
          id: 4,
          code: 'portrait',
          name: 'Ảnh chân dung',
        },
      ],
      selectedTab: {
        id: 1,
        code: 'wedding',
        name: 'Ảnh cưới',
      },
      listServices: listServices
    }
  },
  props: {
    route: String,
  },
  computed: {
    listTransformedServices() {
      const result = this.listServices.reduce((result, item) => {
        const { categoryId, ...rest } = item;

        if (!result[categoryId]) {
          result[categoryId] = [];
        }

        result[categoryId].push(rest);

        return result;
      }, {});
      console.log('result', result, this.selectedTab)
      return result
    }
  },
  mounted() {
    AOS.init({});
    console.log('=======',this.route)
  },
  methods: {
    selectTab(cat) {
      this.selectedTab = cat
    },
    formatMoney(number) {
      if (number != undefined) {
        let money = number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')
        if (money === '') {
          money = '0'
        }
        return money
      }
    },
  },
};
</script>

<style scoped>
.price-wrapper {
  padding-left: 1rem !important;
  display: flex;
  justify-content: flex-start;
  gap: 10px;
  margin-top: 15px;
}
.price-wrapper div:first-child {
  color: #fff;
  font-size: 13px;
  text-decoration: line-through
}
.price-wrapper div:last-child {
  font-weight: bold;
  font-size: 15px;
  color: yellow;
}
</style>
