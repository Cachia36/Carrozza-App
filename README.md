<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; margin: 20px;">

  <h1>Carrozza App 🚗</h1>

  <p>A simple Laravel application for managing <strong>cars</strong> and <strong>manufacturers</strong>.</p>

  <p>It allows you to:</p>
  <ul>
    <li>Add, edit, view, and delete car models</li>
    <li>Add and manage manufacturers</li>
    <li>Filter cars by manufacturer</li>
    <li>Validate inputs (model, year, salesperson email, phone, etc.)</li>
    <li>Persist filter selections using localStorage</li>
  </ul>

  <p><strong>🌐 Live Demo:</strong> 
    <a href="https:/carrozzaapp.koyeb.app/" target="_blank">
      Carrozza App on Koyeb
    </a>
  </p>

  <hr>

  <h2>🚀 Features</h2>
  <ul>
    <li>Laravel 10 backend</li>
    <li>PostgreSQL database</li>
    <li>Bootstrap UI components</li>
    <li>Manufacturer–Car relationship (foreign key)</li>
    <li>Form validation with error messages</li>
    <li>HTTPS forced in production</li>
    <li>Deployment on <strong>Koyeb</strong></li>
  </ul>

  <hr>

  <h2>🛠️ Installation (Local Development)</h2>

  <h3>1. Clone the repository</h3>
  <pre><code>git clone https://github.com/your-username/your-repo.git
cd your-repo</code></pre>

  <h3>2. Install dependencies</h3>
  <pre><code>composer install
npm install &amp;&amp; npm run dev</code></pre>

  <h3>3. Set up environment</h3>
  <pre><code>cp .env.example .env</code></pre>

  <p>Update <code>.env</code> with your database credentials:</p>
  <pre><code>DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=carrozza
DB_USERNAME=your_username
DB_PASSWORD=your_password</code></pre>

  <h3>4. Generate Laravel app key</h3>
  <pre><code>php artisan key:generate</code></pre>

  <h3>5. Run migrations & seeders</h3>
  <pre><code>php artisan migrate --force
php artisan db:seed --class=CarSeeder --force
php artisan db:seed --class=ManufacturerSeeder --force</code></pre>
    
  <hr>

  <h2>▶️ Running Locally</h2>
  <pre><code>php artisan serve</code></pre>
  <p>Visit: <a href="http://localhost:8000" target="_blank">http://localhost:8000</a></p>

  <hr>

  <h2>🌍 Deployment (Koyeb)</h2>
  <p>This app is deployed on <a href="https://www.koyeb.com/" target="_blank">Koyeb</a>.</p>
  <p>Steps followed:</p>
  <ol>
    <li>Push code to GitHub</li>
    <li>Connect GitHub repo to Koyeb</li>
    <li>Add environment variables (<code>.env</code>)</li>
    <li>Run migrations & seeders with:
      <pre><code>php artisan migrate --force</code>
php artisan db:seed --class=CarSeeder --force
php artisan db:seed --class=ManufacturerSeeder --force</code></pre>
    </li>
  </ol>

  <hr>

  <h2>📂 Project Structure</h2>
  <pre><code>app/Http/Controllers   -&gt; CarController, ManufacturerController
app/Models             -&gt; Car.php, Manufacturer.php
database/migrations    -&gt; Database schema
resources/views        -&gt; Blade templates
routes/web.php         -&gt; Application routes</code></pre>

  <hr>

  <h2>✨ Example Pages</h2>
  <ul>
    <li><code>/cars</code> → List of cars with filter</li>
    <li><code>/cars/create</code> → Add a new car</li>
    <li><code>/manufacturers</code> → List of manufacturers</li>
    <li><code>/manufacturers/create</code> → Add a manufacturer</li>
  </ul>

  <hr>

  <h2>📝 License</h2>
  <p>This project is for educational purposes. Free to use and adapt.</p>

</body>
</html>
