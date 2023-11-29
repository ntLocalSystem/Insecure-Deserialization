require 'drb'


class Hello
    include DRbUndumped
    attr_accessor :name
    def initialize(pname="User")
        name = pname
    end
    def greetUser
        puts "[+] greetUser() called."
        return "Hello #{user}, welcome to the world!" 
    end
end

class HelloWorldServer
    def returnHello(username="User")
        puts "[+] returnHello() called."
        return Hello.new(username)
    end
end

class CustomIdConv
    def to_id(obj)
        return "HW:#{obj.object_id}"
    end
    
    def to_obj(ref)
        ObjectSpace._id2ref(ref.gsub(/^HW:/, "").to_i)
    end
end

DRb.install_id_conv(CustomIdConv.new)
DRb.start_service("druby://192.168.1.200:6666", HelloWorldServer.new)
puts "[+] Server Started."
DRb.thread.join