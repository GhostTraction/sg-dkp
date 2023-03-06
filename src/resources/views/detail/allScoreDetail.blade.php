<table id="allDkp" class="table table-bordered">
    <thead>
    <tr>
        <th>角色名</th>
        <th>获取DKP</th>
        <th>花费DKP</th>
    </tr>
    </thead>
    <tbody>
    @foreach (json_decode($userScoreDetail,false) as $dkp)
        <tr>
            <td>
                {{$dkp->name}}
            </td>
            <td>
                {{$dkp->score}}
            </td>
            <td>{{$dkp->remark}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
