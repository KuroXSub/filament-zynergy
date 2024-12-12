<h1>Filament Zynergy</h1>

<p>Filament Zynergy is a Laravel-based application powered by Filament, designed to manage personalization, user, and reminder data. This application leverages Laravel as the backend and Filament as the admin panel to facilitate CRUD (Create, Read, Update, Delete) operations.</p>

<h2>Deployment Information</h2>

<p>The Filament Zynergy application has been deployed and is accessible at:</p>

<p><strong>Website</strong>: <a href="https://backoffice-zynergy.gevannoyoh.com/admin/login" target="_blank">https://backoffice-zynergy.gevannoyoh.com/admin/login</a></p>

<div class="credentials">
    <h2>Login Credentials</h2>
    <p>You can use the following credentials to log in to the deployed application:</p>
    <ul>
        <li><strong>Email</strong>:
            <ul>
                <li>adminichi@kuroxsub.my.id</li>
                <li>adminni@kuroxsub.my.id</li>
                <li>adminsan@kuroxsub.my.id</li>
                <li>adminyon@kuroxsub.my.id</li>
                <li>admingo@kuroxsub.my.id</li>
            </ul>
        </li>
        <li><strong>Password</strong>: <code>password</code></li>
    </ul>
</div>

<h2>Technical Specifications</h2>

<ul>
    <li><strong>Framework</strong>: Laravel</li>
    <li><strong>Admin Panel</strong>: Filament</li>
    <li><strong>Programming Language</strong>: PHP 8.3</li>
    <li><strong>Database</strong>: MySQL 8.0.30</li>
    <li><strong>Main Features</strong>:
        <ul>
            <li>Personalization Management</li>
            <li>User Management</li>
            <li>Reminder Management</li>
        </ul>
    </li>
</ul>

<h2>Application Features</h2>

<ol>
    <li><strong>Personalization Management</strong>:
        <ul>
            <li>Create, read, update, and delete personalization data.</li>
            <li>Personalization features may include themes, display settings, and user preferences.</li>
        </ul>
    </li>
    <li><strong>User Management</strong>:
        <ul>
            <li>Manage user data such as name, email, and login information.</li>
            <li>CRUD features for users.</li>
        </ul>
    </li>
    <li><strong>Reminder Management</strong>:
        <ul>
            <li>Create, read, update, and delete reminders.</li>
            <li>Reminders can be scheduled based on date, time, or specific categories.</li>
        </ul>
    </li>
</ol>

<h2>System Requirements</h2>

<p>Before getting started, ensure your system meets the following requirements:</p>

<ul>
    <li>PHP 8.3 or higher</li>
    <li>MySQL 8.0.30</li>
    <li>Composer (for PHP dependency management)</li>
    <li>Node.js (for frontend dependency management)</li>
    <li>Git (for cloning the repository)</li>
</ul>

<h2>How to Clone and Install</h2>

<h3>1. Clone the Repository</h3>
<p>First, clone this repository to your local machine using the following command:</p>
<pre><code>git clone https://github.com/KuroXSub/filament-zynergy.git</code></pre>
<p>Replace <code>username</code> with your GitHub username and <code>filament-zynergy</code> with your repository URL.</p>

<h3>2. Navigate to the Project Directory</h3>
<p>After the cloning process is complete, navigate to the project directory:</p>
<pre><code>cd filament-zynergy</code></pre>

<h3>3. Install PHP Dependencies</h3>
<p>Use Composer to install all PHP dependencies:</p>
<pre><code>composer install</code></pre>

<h3>4. Install Frontend Dependencies</h3>
<p>If your project has frontend dependencies, run the following command to install them:</p>
<pre><code>npm install</code></pre>

<h3>5. Configure the Environment</h3>
<p>Copy the <code>.env.example</code> file to <code>.env</code>:</p>
<pre><code>cp .env.example .env</code></pre>
<p>Edit the <code>.env</code> file to configure the database and other settings according to your environment. For example:</p>
<pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=filament_zynergy
DB_USERNAME=root
DB_PASSWORD=</code></pre>

<h3>6. Generate Application Key</h3>
<p>Generate the Laravel application key with the following command:</p>
<pre><code>php artisan key:generate</code></pre>

<h3>7. Run Database Migrations</h3>
<p>Run the migrations to create the necessary tables:</p>
<pre><code>php artisan migrate</code></pre>

<h3>8. Start the Local Server</h3>
<p>To run the local server, use the following command:</p>
<pre><code>php artisan serve</code></pre>
<p>The application will be accessible at <code>http://localhost:8000</code>.</p>

<h3>9. (Optional) Seed the Database</h3>
<p>If you want to populate the database with dummy data, run the following command:</p>
<pre><code>php artisan db:seed</code></pre>

<h2>Contribution</h2>
<p>We highly appreciate contributions. Please create a pull request if you would like to contribute to this project.</p>

<h2>License</h2>
<p>This project is licensed under the <a href="LICENSE" target="_blank">MIT License</a>.</p>

</body>
</html>