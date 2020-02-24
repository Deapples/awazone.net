<div id="aside">
        <aside>
        <p id="cancel"> &times; </p>
            <p id="pro"><i class="fa fa-user-circle"></i></p>
            <p>Stage: {{$data->stage}}</p>
            <p><a href="/dashboard"><i class="fa fa-home"></i> DASHBOARD</a></p>
            <p><a href="/profile"><i class="fa fa-user"></i> PROFILE</a></p>
            <p><a href="/tree"><i class="fa fa-sitemap"></i> GENEAOLOGY</a></p>
            <p><a href="/transact"><i class="fa fa-bolt"></i> TRANSACTION</a></p>
            <p><a href="/incentive"><i class="fa fa-gift"></i> INCENTIVES</a></p>
            <p><a href="/withdraw"><i class="fa fa-smile"></i> WITHDRAWAL</a></p>
            <form action="/logout" method="post">
                    {{@csrf_field()}}
                <p><button><i class="fa fa-power-off"></i> logout</button></p>
            </form>
        </aside>
    </div>