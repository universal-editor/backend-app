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

## RESTful API

* News
    * List: `GET http://universal-backend.dev/rest/v1/news`
    * One: `GET http://universal-backend.dev/rest/v1/news/<id>`
    * Create: `POST http://universal-backend.dev/rest/v1/news`
    * Update: `PUT http://universal-backend.dev/rest/v1/news/<id>`
    * Delete: `DELETE http://universal-backend.dev/rest/v1/news/<id>`
    * Lock: `LOCK http://universal-backend.dev/rest/v1/news/<id>` (news #3 and #4 already locked)
    * Unlock: `UNLOCK http://universal-backend.dev/rest/v1/news/<id>` (news #3 and #4 already locked)

* News categories
    * List: `GET http://universal-backend.dev/rest/v1/news/categories`
    * One: `GET http://universal-backend.dev/rest/v1/news/categories/<id>`
    * Create: `POST http://universal-backend.dev/rest/v1/news/categories`
    * Update: `PUT http://universal-backend.dev/rest/v1/news/categories/<id>`
    * Delete: `DELETE http://universal-backend.dev/rest/v1/news/categories/<id>`
    
* Staff
    * List: `GET http://universal-backend.dev/rest/v1/staff`
    * One: `GET http://universal-backend.dev/rest/v1/staff/<id>`
    * Create: `POST http://universal-backend.dev/rest/v1/staff`
    * Update: `PUT http://universal-backend.dev/rest/v1/staff/<id>`
    * Delete: `DELETE http://universal-backend.dev/rest/v1/staff/<id>`
    
* Country
    * List: `GET http://universal-backend.dev/rest/v1/country`
    * One: `GET http://universal-backend.dev/rest/v1/country/<id>`
    * Create: `POST http://universal-backend.dev/rest/v1/country`
    * Update: `PUT http://universal-backend.dev/rest/v1/country/<id>`
    * Delete: `DELETE http://universal-backend.dev/rest/v1/country/<id>`
    
* Tags
    * List: `GET http://universal-backend.dev/rest/v1/tags`
    * One: `GET http://universal-backend.dev/rest/v1/tags/<id>`
    * Create: `POST http://universal-backend.dev/rest/v1/tags`
    * Update: `PUT http://universal-backend.dev/rest/v1/tags/<id>`
    * Delete: `DELETE http://universal-backend.dev/rest/v1/tags/<id>`