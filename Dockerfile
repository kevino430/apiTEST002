# 使用官方 PHP 镜像。选择带有 CLI 的版本
FROM php:7.4-cli

# 如果需要，可以安装额外的 PHP 扩展
# RUN docker-php-ext-install curl

# 将您的 PHP 脚本复制到容器的工作目录
COPY api_test.php /usr/src/myapp/api_test.php

# 设置工作目录
WORKDIR /usr/src/myapp

# 使用 PHP 内置服务器来处理请求。使用 $PORT 环境变量确保兼容 Cloud Run
CMD php -S 0.0.0.0:${PORT} api_test.php
