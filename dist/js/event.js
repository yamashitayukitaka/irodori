const event = document.querySelector(".p-event__blog__listItem");
const eventList = event.offsetHeight;
document.documentElement.style.setProperty("--eventList", eventList + "px");

window.addEventListener("resize", function () {
  const event = document.querySelector(".p-event__blog__listItem");
  const eventList = event.offsetHeight;
  document.documentElement.style.setProperty("--eventList", eventList + "px");
});

