<?php


namespace MyApp;

interface Loggable
{
    public function log($message);
}

interface Notifiable
{
    public function notify($message);
}

class Logger implements Loggable
{
    public function log($message)
    {
        echo "Logging: " . $message . "\n";
    }
}

class Notifier implements Notifiable
{
    public function notify($message)
    {
        echo "Notifying: " . $message . "\n";
    }
}

class User implements Loggable, Notifiable
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function log($message)
    {
        echo $this->name . " is logging: " . $message . "\n";
    }

    public function notify($message)
    {
        echo $this->name . " is notifying: " . $message . "\n";
    }
}

// Gebruik van de classes en interfaces




