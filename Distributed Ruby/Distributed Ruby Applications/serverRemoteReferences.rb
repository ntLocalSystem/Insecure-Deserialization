require 'drb'

class HelloWorldServer
    include DRbUndumped
    attr_accessor :username
    def greetUser(username="User")
        self.username = username
        puts "[+] greetUser() called with parameter #{username}"
        return "Hello, #{self.username}! Welcome."
    end
end

class AnotherHelloWorldServer
    include DRbUndumped
    attr_accessor :username
    def greetAnotherUser(username="User")
        self.username = username
        puts "[+] greetUser() called with parameter #{username}"
        return "Hello, #{self.username}! Welcome from AnotherHelloWorld."
    end
end

class GetRemoteReference

    attr_accessor :helloWorld
    attr_accessor :anotherHelloWorld

    def initialize
        self.helloWorld = HelloWorldServer.new
        self.anotherHelloWorld = AnotherHelloWorldServer.new
        puts "Object ID of object returned in server memory space: #{self.helloWorld.object_id}"
        puts "Object ID of second object in server memory space: #{self.anotherHelloWorld.object_id}"
    end

    def getObjectID
        return self.anotherHelloWorld.object_id
    end

    def getReference
        puts "[+] getReference() called."
        return self.helloWorld
    end
end



DRb.start_service("druby://127.0.0.1:6666", GetRemoteReference.new)
puts "[+] Server Started."
DRb.thread.join