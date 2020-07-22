# Forum v 0.1

把必须的模型建好了。

## 安装方式
请按照[文档](https://diisquare.github.io/toturial/laravel/installation.html)里的方式把代码 pull 下来，并安装。

运行
```shell
composer dump-autoload
php artisan migrate
php artisan db:seed
```
即可；

## 路由说明
'/users/{id}' 用户个人信息
'/{sectionTitle}' 板块信息
'/posts/{id}' 提问信息
'/articles/{id}' 文章信息
