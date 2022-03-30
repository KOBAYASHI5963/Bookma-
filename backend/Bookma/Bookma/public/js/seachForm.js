function clearForm() {
  // キーワード
 var textForm = document.getElementById("keyword");
  textForm.value = '';

  // カテゴリー
  let categoryForm = document.getElementById("category_id")
  categoryForm.selectedIndex = 0

  // 商品の状態
  let conditionForm = document.getElementById("product_condition")
  conditionForm.selectedIndex = 0
  
  // プライス
  let priceForm = document.getElementById("price")
  priceForm.selectedIndex = 0
}