
require 'drb'

class HelloWorldServer
    def say_hi(name="User")
        puts "[+] say_hi() called with parameter #{name}"
        return "Hi, #{name}!"
    end
end

DRb.start_service("druby://127.0.0.1:6666", HelloWorldServer.new)
puts "[+] Server Started."
DRb.thread.join