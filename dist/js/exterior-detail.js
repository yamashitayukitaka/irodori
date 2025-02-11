const articleHeight = document.querySelector(".p-exterior-detail__article").offsetHeight;
//document.querySelector()メソッドを使用する際に、クラス名を指定する場合は、クラス名の前に.（ピリオド）を付ける必要あり
document.documentElement.style.setProperty("--articleHeight", articleHeight + "px");

window.addEventListener("resize", function () {
  const articleHeight = document.querySelector(".p-exterior-detail__article").offsetHeight;
  document.documentElement.style.setProperty("--articleHeight", articleHeight + "px");
});