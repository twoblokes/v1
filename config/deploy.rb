set :scm, :git
set :repository, "https://github.com/twoblokes/v1.git"
set(:git_enable_submodules, true)

set :user, "oreardon"
server "www.oreardon.com", :app
set :deploy_to, "home4/oreardon/public_html/twoblokes/live/000_two_blokes"

ssh_options[:forward_agent] = true
set :deploy_via, :remote_cache
set :copy_exclude, [".git", ".DS_Store", ".gitignore", ".gitmodules"]
set :use_sudo, false

namespace :wordpress do
    desc "Setup symlinks for a WordPress project"
    task :create_symlinks, :roles => :app do
        run "ln -nfs #{shared_path}/uploads #{release_path}/content/uploads"
    end
end

after "deploy:create_symlink", "wordpress:create_symlinks"

run "mkdir -p #{shared_path}/uploads"

run "ln -nfs #{shared_path}/wp-config.php #{release_path}/wp-config.php"

require 'capistrano/ext/multistage'
set :stages, %w(production staging)
set :default_stage, "staging"