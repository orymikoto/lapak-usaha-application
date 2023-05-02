import './bootstrap';
import '../css/app.css'

import Swiper from 'swiper/bundle';

// import 'swiper/css';
// import 'swiper/css/navigation';
// import 'swiper/css/pagination';

const swiper = new Swiper('.swiper', {
  // Optional parameters
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

const selectProvince = (code) => {
  console.log(code);
  return location.href(`/profile?edit=true&provinsi=${code}`)
}