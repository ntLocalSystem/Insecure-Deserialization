
require 'drb'
require 'drb/acl'

class EchoServer
    def echoInReverse(toReverse=nil)
        puts "[+] echoInReverse() method called."
        if(toReverse==nil)
            return "Need a string to reverse."
        else
            return toReverse.reverse
        end
    end
        
    def echoBack(toEcho=nil)
        puts "[+] echoBack() method called."
        if(toEcho==nil)
            return "Need a string to echo back."
        else
            return toEcho
        end
    end
end

# Install the ACL
acl = ACL.new(["deny", "all", "allow", "192.168.1.200"])
DRb.install_acl(acl)

DRb.start_service("druby://192.168.1.200:6666", EchoServer.new)
puts "[+] Server Started."
DRb.thread.join()