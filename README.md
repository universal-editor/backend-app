# Universal backend

Test API for the Universal editor.

## Installation

1. Install [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
2. Install [Vagrant](https://www.vagrantup.com/downloads.html)
3. Create GitHub [personal API token](https://github.com/blog/1509-personal-api-tokens)
3. Prepare project:
   
```bash
git clone https://github.com/universal-editor/backend-app.git
cd backend-app/vagrant/config
cp vagrant-local.example.yml vagrant-local.yml
```
   
4. Place your GitHub personal API token to `vagrant-local.yml`
5. Change directory to project root:

   ```bash
   cd backend-app
   ```

5. Run commands:

   ```bash
   vagrant plugin install vagrant-hostmanager
   vagrant up
   ```
   
That's all. You just need to wait for completion! After that you can access project locally 
by URL http://universal-backend.dev.