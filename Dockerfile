# 使用官方 PHP 镜像。选择带有 CLI (命令行接口) 的版本，因为我们不需要 Apache 或 Nginx
FROM php:7.4-cli

# 如果需要，可以安装额外的 PHP 扩展
# RUN docker-php-ext-install curl

# 将您的 PHP 脚本复制到容器的工作目录。您可以根据需要调整路径和文件名
COPY api_test.php /usr/src/myapp/api_test.php

# 设置工作目录
WORKDIR /usr/src/myapp

# 通过 PHP CLI 运行您的脚本。注意：这里假设您的脚本是自运行的，不需要通过 Web 服务器访问
CMD [ "php", "./api_test.php" ]