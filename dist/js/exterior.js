(function($) {
const ttlWrapHeight = document.querySelector(".p-exterior__company__ttlWrap").offsetHeight;
document.documentElement.style.setProperty(
  "--ttlWrapHeight",
 ttlWrapHeight  + "px"
);

window.addEventListener("resize", function () {
  const ttlWrapHeight = document.querySelector(".p-exterior__company__ttlWrap").offsetHeight;
  document.documentElement.style.setProperty(
    "--ttlWrapHeight",
   ttlWrapHeight  + "px");
});

})(jQuery);