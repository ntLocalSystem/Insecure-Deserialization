class MethodMissingClass

    def method_missing(m, *args, &block)
        if(m.to_s == "missingMethod")
            self.greetWelcome(2)
        else
            super
        end
    end

    def greetWelcome(flag=0)
        if(flag==2)
            puts "Welcome with flag=2 to MethodMissingClass"
        else
            puts "Welcome to MethodMissingClass"
        end
    end
end


missingMethod = MethodMissingClass.new
missingMethod.greetWelcome
missingMethod.send(:missingMethod)