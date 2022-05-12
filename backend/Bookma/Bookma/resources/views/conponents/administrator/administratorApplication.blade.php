<div class="mt-3 ml-5">
  <h3>出金管理</h3>
</div>


<div class="btn-group mt-2 ml-5" role="group">
  <a href="{{ route('profileEdit') }}" class="btn btn-outline-primary">出金申請中</a>
  <a href="{{ route('profileEdit') }}" class="btn btn-outline-primary">出金済</a>
</div>

<table class="table mt-2 ml-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">申請ユーザー</th>
      <th scope="col">申請日時</th>
      <th scope="col">申請金額</th>
      <th scope="col">アクション</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td><button type="submit" class="btn btn-danger">入金する</button></td>
    </tr>
  </tbody>
</table>
