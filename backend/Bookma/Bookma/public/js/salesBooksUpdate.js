let imageId1;
// 0だったらそのまま1だったら削除
let deleteflag1 = 0;

let imageId2;
// 0だったらそのまま1だったら削除
let deleteflag2 = 0;

let imageId3;
// 0だったらそのまま1だったら削除
let deleteflag3 = 0;

let imageId4;
// 0だったらそのまま1だったら削除
let deleteflag4 = 0;

let imageId5;
// 0だったらそのまま1だったら削除
let deleteflag5 = 0;

// trueの時エラーを表示する
let imageError = false;
let imageErrorAlertDom = document.getElementById('imageError');

// ポスト送信
async function updateBook(e) {
  // errorアラートを非表示にする
  imageError = false;
  imageErrorAlertDom.classList.remove('alert','alert-danger');
  imageErrorAlertDom.innerHTML = '';

  
  await inseartVal1();
  await inseartVal2();
  await inseartVal3();
  await inseartVal4();
  await inseartVal5();

  // 最後のname属性に渡す
  document.getElementById('imageId1').value = imageId1;
  document.getElementById('imageId2').value = imageId2;
  document.getElementById('imageId3').value = imageId3;
  document.getElementById('imageId4').value = imageId4;
  document.getElementById('imageId5').value = imageId5;

  document.getElementById('deleteflag1').value = deleteflag1;
  document.getElementById('deleteflag2').value = deleteflag2;
  document.getElementById('deleteflag3').value = deleteflag3;
  document.getElementById('deleteflag4').value = deleteflag4;
  document.getElementById('deleteflag5').value = deleteflag5;
  // 送信
  if(!imageError) {
    document.getElementById('updatebook').submit();
  } else {
    console.log('画像一枚目が登録されていません');
  }
}

function inseartVal1() {
  var filePreview1 = document.getElementById('file-preview1');
  let val1 = filePreview1.dataset.id;
  imageId1 = val1;

//画像①枚目に関しては画像がないまま送信されたらエラーにしたい
  if(!filePreview1.src) {
    deleteflag1 = 1;
    imageError = true;

  } else {
    deleteflag1 = 0;
  }

//errorアラートを表示させる
  if(imageError) {
    imageErrorAlertDom.classList.add('alert','alert-danger');
    imageErrorAlertDom.innerHTML = '1枚目の商品画像は必ず登録して下さい。';

    //トップへ戻す
    window.scroll({top: 0, behavior: 'smooth'});

  }
}
function inseartVal2() {
  var filePreview2 = document.getElementById('file-preview2');
  let val2 = filePreview2.dataset.id;
  imageId2 = val2;

  if(!filePreview2.src) {
    deleteflag2 = 1;
  } else {
    deleteflag2 = 0;
  }
}
function inseartVal3() {
  var filePreview3 = document.getElementById('file-preview3');
  let val3 = filePreview3.dataset.id;
  imageId3 = val3;

  if(!filePreview3.src) {
    deleteflag3 = 1;
  } else {
    deleteflag3 = 0;
  }
}
function inseartVal4() {
  var filePreview4 = document.getElementById('file-preview4');
  let val4 = filePreview4.dataset.id;
  imageId4 = val4;

  if(!filePreview4.src) {
    deleteflag4 = 1;
  } else {
    deleteflag4 = 0;
  }
}
function inseartVal5() {
  var filePreview5 = document.getElementById('file-preview5');
  let val5 = filePreview5.dataset.id;
  imageId5 = val5;

  if(!filePreview5.src) {
    deleteflag5 = 1;
  } else {
    deleteflag5 = 0;
  }
}

// イメージ１
// プレビュー
document.getElementById('file-sample1').addEventListener('change', function(e) {
  
  var file = e.target.files[0];

  // ファイルのブラウザ上でのURLを取得する
  var blobUrl = window.URL.createObjectURL(file);

  // img要素に表示
  var img = document.getElementById('file-preview1');
  img.src = blobUrl;
  
});
// 削除
document.getElementById('delete-file-preview1').addEventListener('click', function(e) {
  
  var img = document.getElementById('file-preview1');
  img.removeAttribute('src');
});







// イメージ2
document.getElementById('file-sample2').addEventListener('change', function(e) {
  
  var file = e.target.files[0];

  // ファイルのブラウザ上でのURLを取得する
  var blobUrl = window.URL.createObjectURL(file);

  // img要素に表示
  var img = document.getElementById('file-preview2');
  img.src = blobUrl;
  
});
// 削除
document.getElementById('delete-file-preview2').addEventListener('click', function(e) {
  
  var img = document.getElementById('file-preview2');
  img.removeAttribute('src');
});

//イメージ3
document.getElementById('file-sample3').addEventListener('change', function(e) {
  
  var file = e.target.files[0];

  // ファイルのブラウザ上でのURLを取得する
  var blobUrl = window.URL.createObjectURL(file);

  // img要素に表示
  var img = document.getElementById('file-preview3');
  img.src = blobUrl;
  
});
// 削除
document.getElementById('delete-file-preview3').addEventListener('click', function(e) {
  
  var img = document.getElementById('file-preview3');
  img.removeAttribute('src');
});

//イメージ4
document.getElementById('file-sample4').addEventListener('change', function(e) {
  
  var file = e.target.files[0];

  // ファイルのブラウザ上でのURLを取得する
  var blobUrl = window.URL.createObjectURL(file);

  // img要素に表示
  var img = document.getElementById('file-preview4');
  img.src = blobUrl;
});
// 削除
document.getElementById('delete-file-preview4').addEventListener('click', function(e) {
  
  var img = document.getElementById('file-preview4');
  img.removeAttribute('src');
});

// イメージ5
document.getElementById('file-sample5').addEventListener('change', function(e) {
  
  var file = e.target.files[0];

  // ファイルのブラウザ上でのURLを取得する
  var blobUrl = window.URL.createObjectURL(file);

  // img要素に表示
  var img = document.getElementById('file-preview5');
  img.src = blobUrl;
});
// 削除
document.getElementById('delete-file-preview5').addEventListener('click', function(e) {
  
  var img = document.getElementById('file-preview5');
  img.removeAttribute('src');
});