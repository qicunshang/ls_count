## 网站统计的小程序
* 基于laravel5.4框架
* 用来统计网站访问次数的小程序，几个小时做的，没有后台，只有统计功能
* 后续会完善，加入ip统计，过滤连接等

### 使用
```
git clone git@github.com:qicunshang/ls_count.git
```
* 执行composer install安装依赖；
* 导入ls_count数据库；
* 复制.env.example为.env然后修改相关配置；

引用方法：
```bash
<script>ls_count('appid','secret_key');</script>
总访问量:<span id="ls_count"></span>, 页面访问量<span id="page_count"></span>
```